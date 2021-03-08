<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDestino_docRequest;
use App\Http\Requests\UpdateDestino_docRequest;
use App\Repositories\Destino_docRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Destino_docController extends AppBaseController
{
    /** @var  Destino_docRepository */
    private $destinoDocRepository;

    public function __construct(Destino_docRepository $destinoDocRepo)
    {
        $this->destinoDocRepository = $destinoDocRepo;
    }

    /**
     * Display a listing of the Destino_doc.
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
     * Show the form for creating a new Destino_doc.
     *
     * @return Response
     */
    public function create()
    {
        return view('destino_docs.create');
    }

    /**
     * Store a newly created Destino_doc in storage.
     *
     * @param CreateDestino_docRequest $request
     *
     * @return Response
     */
    public function store(CreateDestino_docRequest $request)
    {
        $input = $request->all();

        $destinoDoc = $this->destinoDocRepository->create($input);

        Flash::success('Destino Doc saved successfully.');

        return redirect(route('destinoDocs.index'));
    }

    /**
     * Display the specified Destino_doc.
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
     * Show the form for editing the specified Destino_doc.
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
     * Update the specified Destino_doc in storage.
     *
     * @param int $id
     * @param UpdateDestino_docRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDestino_docRequest $request)
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
     * Remove the specified Destino_doc from storage.
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
