<?php

namespace App\Http\Controllers;

use App\Mail\Despacho;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $user = auth()->user();
        //dd($user->email);
        Mail::to($user->email)->send(new Despacho($user));
        redirect()->back();

        if (Mail::failures()) {
            return response()->Fail('Sorry! Please try again latter');
        }else{
            return response()->success('E-mail enviado com sucesso');
        }
    }
}
