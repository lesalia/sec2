@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7" style="margin-top: 2%">
                <div class="box">
                    <h3 class="box-title" style="padding: 2%"> Verifique o seu endereço eletrônico (e-mail)</h3>

                    <div class="box-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">Um novo link de verificação foi enviado
                                para o seu endereço de e-mail
                            </div>
                        @endif
                        <p>Antes de proceder com as operações, verifique o seu e-mail para confirmação da sua conta,</p>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link">
                                Depois de 2 minutos sem receber o e-mail de confirmação click aqui novamente
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
