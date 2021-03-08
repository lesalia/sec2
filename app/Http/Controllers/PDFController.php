<?php

namespace App\Http\Controllers;

use App\Models\Acesso;
use App\Models\Doc;
use App\Models\Ocorencia;

class PDFController extends AppBaseController
{

    public function pdfForm()
    {
        return view('pdf_form');
    }

    public function pdfDownload(){
       $request = request()->validate([
            'tipo' => 'required',
            'datainic' => 'required',
            'datafim' => 'required'
        ]);

        $data =
            [
                'tipo' => $request['tipo'],
                'datainic' => $request['datainic'],
                'datafim' => $request['datafim'],
                'total' => null,
                'despachado' => null,
                'analise' => null
            ];
            $datainic = $data['datainic'];
            $datafim = $data['datafim'];

        $nr = Doc::all()
            ->where('created_at', '>=',$datainic)
            ->where('created_at', '<=',$datafim)
            ->count();

        $despachado = Doc::all()
            ->where('created_at', '>=',$datainic)
            ->where('created_at', '<=',$datafim)
            ->where('estado','=',1)
            ->count();

        $analise = Doc::all()
            ->where('created_at', '>=',$datainic)
            ->where('created_at', '<=',$datafim)
            ->where('estado','=',0)
            ->count();

        // actualizar o array data
        $data['total'] = $nr;
        $data['despachado'] = $despachado;
        $data['analise'] = $analise;

        //    Ao receber o tipo de relatorio do formulario deve verificar qual do relatorios mostrar
        switch ($data['tipo']) {
            case 1:
                $lista = Doc::select('*')
                    ->where('created_at', '>=',$datainic)
                    ->where('created_at', '<=',$datafim)
                    ->get();
                return view('relatorios.documentos')->with(['lista'=>$lista, 'data'=>$data]);
                break;
            case 2:
                $lista = Acesso::select('*')
                    ->where('created_at', '>=',$datainic)
                    ->where('created_at', '<=',$datafim)
                    ->get();

                //total de acessos
                $nr = Acesso::all()
                    ->where('created_at', '>=',$datainic)
                    ->where('created_at', '<=',$datafim)
                    ->count();
                $data['total'] = $nr;
                return view('relatorios.acessos')->with(['lista'=>$lista, 'data'=>$data]);
                break;
            case 3:
                $lista = Ocorencia::select('*')
                    ->where('created_at', '>=',$datainic)
                    ->where('created_at', '<=',$datafim)
                    ->get();

                //total de acessos
                $nr = Ocorencia::all()
                    ->where('created_at', '>=',$datainic)
                    ->where('created_at', '<=',$datafim)
                    ->count();
                $data['total'] = $nr;
                return view('relatorios.ocorrencias')->with(['lista'=>$lista, 'data'=>$data]);
                break;
        }
        return view('');
    }

}
