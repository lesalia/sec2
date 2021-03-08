<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDocRequest;
use App\Http\Requests\UpdateDocRequest;
use App\Mail\Confirmacao;
use App\Mail\Despacho;
use App\Models\Destino;
use App\Models\Destino_doc;
use App\Models\Doc;
use App\Repositories\DocRepository;
use App\Http\Controllers\AppBaseController;
use Gate;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Response;

class DocController extends AppBaseController
{
    /** @var  DocRepository */
    private $docRepository;

    public function __construct(DocRepository $docRepo)
    {
        $this->middleware(['auth','verified']);
        $this->docRepository = $docRepo;
    }
    /**
     * Display a listing of the Doc.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->nivel>1)
            $docs = $this->docRepository->all();
        else
            $docs = Doc::all()->where('user_id','=',Auth::user()->id);

        return view('docs.index')
            ->with('docs', $docs);
    }
    /**
     * Show the form for creating a new Doc.
     *
     * @return Response
     */
    public function create()
    {
        return view('docs.create');
    }
    /**
     * Store a newly created Doc in storage.
     *
     * @param CreateDocRequest $request
     *
     * @return Response
     */
    public function store(CreateDocRequest $request)
    {
        $request->validate([
            'file' => 'required|max:5000|mimes:pdf',
        ]);
        $input = $request->all();
        if($request->has('file')){
            $fileUploaded = $request->file('file');
            $fileName = time().'.'.$fileUploaded->getClientOriginalExtension();
            $filepath = public_path('../files/');
            $fileUploaded->move($filepath,$fileName);
        }
        $doc = $this->docRepository->create($input);
        $doc->file = '/files/' . $fileName;
        $doc->user_id = Auth::id();
        $doc->nrDoc = $doc->id.'.'. now()->format('Y');
        $doc->save();
        $idDoc = $doc->id;

        Flash::success('Documento Enviado com sucesso !');

        return redirect(route('docs.index', $idDoc));
    }

    /**
     * Display the specified Doc.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $doc = $this->docRepository->find($id);
        if (empty($doc)) {
            Flash::error('Deve anexar pelos menos um ficheiro');

            return redirect(route('docs.index'));
        }
        $destino2 = Doc::find($id);  // Busca todos departamentos associados o documento selecionado (Encaminhamento de documentos)
        return view('docs.show')
            ->with('doc', $doc)
            ->with('destino2', $destino2);
    }
    /**
     * Show the form for editing the specified Doc.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $doc = $this->docRepository->find($id);

        if (empty($doc)) {
            Flash::error('Doc not found');

            return redirect(route('docs.index'));
        }
        //$this->authorize('update-doc',$doc);
        if ( Gate::denies('update-doc', $doc)){
            abort(403, 'NAo autorizado');
        }
        return view('docs.edit')->with('doc', $doc);
    }

    /**
     * Update the specified Doc in storage.
     *
     * @param int $id
     * @param UpdateDocRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocRequest $request)
    {
        $doc = $this->docRepository->find($id);
        $ficheiro = $doc->file;
        $input =  $request->all();
        if (empty($doc)) {
            Flash::error('Doc nott found');
            return redirect(route('docs.index'));
        }
        if (empty($input['file'])) {
            unset($input['file']);
        } else {
            //inserir imagem actualizada
        }
        if ($doc->estado_id > 2){
            Flash::warning('Este documento ja foi DESPACHADO. Nao pode ser Alterado');
            return redirect(route('docs.index'));
        }else{
            $doc = $this->docRepository->update($input, $id);
            $doc->file = $ficheiro;
            $doc->save();
        }

        Flash::success('Documento Actualizado.');

        return redirect(route('docs.index'));
    }

    /**
     * Remove the specified Doc from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $doc = $this->docRepository->find($id);

        if (empty($doc)) {
            Flash::error('Doc not found');

            return redirect(route('docs.index'));
        }

        $this->docRepository->delete($id);

        Flash::success('Doc deleted successfully.');

        return redirect(route('docs.index'));
    }
    public function encaminhar(Request $request){

        /* Receber doc_id */
            $doc = $this->docRepository->find($request->input('encaminhar'));

        if (empty($doc)) {
            Flash::error('documento nao foi encontrado');
            return redirect()->back();
        }
        //Actualizar estado do documento
        Doc::where('id',$doc->id)->update([
            'estado_id'=> 2,
            'updated_at' => date('Y-m-d')
        ]);
        //Assunto email eh aqui...
        $connected = @fsockopen("www.google.com", 80);
        if ($doc->estado_id<2){
            Mail::to($doc->email)->send(new Confirmacao($doc));
        }
        $dadosdoc = array(
            'doc'=> $doc->id,
            'file' => $doc->file
        ) ;
        return view('destino_docs.create', compact('dadosdoc'));
    }

    public function despachar(Request $request){
        $doc = $this->docRepository->find($request->input('despachar'));
        if (empty($doc)) {
            Flash::error('documento nao foi encontrado');
            return redirect()->back();
        }
        //Actualizar estado do documento
        Doc::where('id',$doc->id)->update([
            'estado_id'=>3,
            'updated_at' => date('Y-m-d')
        ]);

        //Notificar o remetente enviando e-mail
        $connected = @fsockopen("www.google.com", 80);
        if ($connected){
            Mail::to($doc->email)->send(new Despacho($doc));
        }
        $dadosdoc = array(
            'doc'=> $doc->id,
            'nrDoc'=> $doc->nrDoc,
            'user_id'=> $doc->user_id
        );
        return view('despachos.create', compact('dadosdoc'));
    }
}
