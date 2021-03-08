<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDestinoDocRequest;
use App\Http\Requests\UpdateDestinoDocRequest;
use App\Repositories\DestinoDocRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DestinoDocController extends AppBaseController
{
    /** @var  DestinoDocRepository */
    private $destinoDocRepository;

    public function __construct(DestinoDocRepository $destinoDocRepo)
    {
        $this->destinoDocRepository = $destinoDocRepo;
    }
    /**
     * Display a listing of the DestinoDoc.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $destinoDocs = $this->destinoDocRepository->all();

        return view('destino_docs.index')
            ->with('destinoDocs', $destinoDocs);
    }

    /**
     * Show the form for creating a new DestinoDoc.
     *
     * @return Response
     */
    public function create()
    {
        return view('destino_docs.create');
    }

    /**
     * Store a newly created DestinoDoc in storage.
     *
     * @param CreateDestinoDocRequest $request
     *
     * @return Response
     */
    public function store(CreateDestinoDocRequest $request)
    {
        $input = $request->all();

        $destinoDoc = $this->destinoDocRepository->create($input);

        Flash::success('Documento encaminhado com sucesso.');

        return redirect(route('docs.index'));
    }

    /**
     * Display the specified DestinoDoc.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $destinoDoc = $this->destinoDocRepository->find($id);

        if (empty($destinoDoc)) {
            Flash::error('Destino Doc not found');

            return redirect(route('destinoDocs.index'));
        }
        return view('destino_docs.show')->with('destinoDoc', $destinoDoc);
    }

    /**
     * Show the form for editing the specified DestinoDoc.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $destinoDoc = $this->destinoDocRepository->find($id);

        if (empty($destinoDoc)) {
            Flash::error('Destino Doc not found');

            return redirect(route('destinoDocs.index'));
        }

        return view('destino_docs.edit')->with('destinoDoc', $destinoDoc);
    }

    /**
     * Update the specified DestinoDoc in storage.
     *
     * @param int $id
     * @param UpdateDestinoDocRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDestinoDocRequest $request)
    {
        $destinoDoc = $this->destinoDocRepository->find($id);

        if (empty($destinoDoc)) {
            Flash::error('Destino Doc not found');

            return redirect(route('destinoDocs.index'));
        }

        $destinoDoc = $this->destinoDocRepository->update($request->all(), $id);

        Flash::success('Destino Doc updated successfully.');

        return redirect(route('destinoDocs.index'));
    }

    /**
     * Remove the specified DestinoDoc from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $destinoDoc = $this->destinoDocRepository->find($id);

        if (empty($destinoDoc)) {
            Flash::error('Destino Doc not found');

            return redirect(route('destinoDocs.index'));
        }

        $this->destinoDocRepository->delete($id);

        Flash::success('Destino Doc deleted successfully.');

        return redirect(route('destinoDocs.index'));
    }
}
