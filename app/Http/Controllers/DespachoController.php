<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDespachoRequest;
use App\Http\Requests\UpdateDespachoRequest;
use App\Models\Despacho;
use App\Repositories\DespachoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class DespachoController extends AppBaseController
{
    /** @var  DespachoRepository */
    private $despachoRepository;

    public function __construct(DespachoRepository $despachoRepo)
    {
        $this->despachoRepository = $despachoRepo;
    }

    /**
     * Display a listing of the Despacho.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function index(Request $request)
    {
        $despachos = $this->despachoRepository->all();
        if(Auth::user()->nivel>1)
            $despachos = $this->despachoRepository->all();
        else
            $despachos = Despacho::all()->where('user_id','==',Auth::user()->id);

        return view('despachos.index')
            ->with('despachos', $despachos);
    }
    /**
     * Show the form for creating a new Despacho.
     *
     * @return Response
     */
    public function create()
    {
        return view('despachos.create');
    }
    /**
     * Store a newly created Despacho in storage.
     *
     * @param CreateDespachoRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreateDespachoRequest $request)
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
        $despacho = $this->despachoRepository->create($input);
        $despacho->file = '/files/' . $fileName;
        $despacho->user = Auth::user()->name;
        $despacho->doc_id = $request->doc_id;
        $despacho->save();
        Flash::success('Despacho anexado.');

        return redirect(route('despachos.index'));
    }

    /**
     * Display the specified Despacho.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $despacho = $this->despachoRepository->find($id);

        if (empty($despacho)) {
            Flash::error('Despacho not found');

            return redirect(route('despachos.index'));
        }

        return view('despachos.show')->with('despacho', $despacho);
    }

    /**
     * Show the form for editing the specified Despacho.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $despacho = $this->despachoRepository->find($id);

        if (empty($despacho)) {
            Flash::error('Despacho not found');

            return redirect(route('despachos.index'));
        }

        return view('despachos.edit')->with('despacho', $despacho);
    }

    /**
     * Update the specified Despacho in storage.
     *
     * @param int $id
     * @param UpdateDespachoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDespachoRequest $request)
    {
        $despacho = $this->despachoRepository->find($id);
        $ficheiro = $despacho->file;
        $iddoc = $despacho->doc_id;
        $input =  $request->all();

        if (empty($despacho)) {
            Flash::error('Despacho not found');

            return redirect(route('despachos.index'));
        }
        if (empty($input['file'])) {
            unset($input['file']);
        } else {
            //inserir imagem actualizada
        }
        $despacho = $this->despachoRepository->update($input, $id);
        $despacho->file = $ficheiro;
        $despacho->doc_id = $iddoc;
        $despacho->save();

        Flash::success('Despacho Actualizado.');

        return redirect(route('despachos.index'));
    }

    /**
     * Remove the specified Despacho from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $despacho = $this->despachoRepository->find($id);

        if (empty($despacho)) {
            Flash::error('Despacho not found');

            return redirect(route('despachos.index'));
        }

        $this->despachoRepository->delete($id);

        Flash::success('Despacho Removido.');

        return redirect(route('despachos.index'));
    }
}
