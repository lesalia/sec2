<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Mail\Despacho;
use App\Models\Acesso;
use App\Models\Destino;
use App\Models\Doc;
use App\Models\Ocorencia;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['verify' => true]);

// eh um truque que isei para pegar id do doc que quer ser despachado
Route::get('/docs/confirmar', function () {
    return view('despachos.create');
});
Auth::routes(['verify' => true]);

// Routas para utilizadores activos *NAO BLOQUEADOS*
Route::group(['middleware' => ['auth', 'check_blocked']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    // ... Any other routes that are accessed only by non-blocked user
});

//Rotas para envio de E-mail
Route::get('email', 'EmailController@sendEMail');

Route::get('/home', 'HomeController@index')->middleware('verified');
Route::resource('users', 'UserController')->middleware('auth');
Route::resource('docs', 'DocController')->middleware('auth');
Route::resource('ocorencias', 'OcorenciaController')->middleware('auth');
Route::resource('pessoas', 'PessoaController')->middleware('auth');
Route::resource('acessos', 'AcessoController')->middleware('auth');
Route::resource('viaturas', 'ViaturaController')->middleware('auth');
Route::resource('despachos', 'DespachoController')->middleware('auth');
Route::get('relatorio', 'PDFController@pdfForm')->middleware('auth');
Route::get('relatorios.documentos', 'PDFController@pdfDownload')->middleware('auth');

// Rotas para altera estado do documento
Route::post('/docs/encaminhar', 'DocController@encaminhar')
    ->name('docs.encaminhar');
// Despachar documento
Route::post('/docs/despachar', 'DocController@despachar')
    ->name('docs.despachar');
// Bloquear utilizador
Route::post('/users/bloquear', 'UserController@bloquear')
    ->name('users.bloquear');
// Registar saida de documento
Route::post('/acessos/saida', 'AcessoController@saida')
    ->name('acessos.saida');

// Rora pegar id do doc no redirect
Route::post('/docs/{id}', 'DocController@Confirmar');

// Estas Routas permitem as variaveis declaradas aqui serem vistas em toda parte do projecto
View::composer(['*'], function ($view){
    $nrdocs = Doc::all()->count();
    $docs0 = Doc::all()
        ->where('estado_id','=',2) //documentos pendenstes
        ->count();
    $docs1 = Doc::all()
        ->where('estado_id','=',3) //documentos Despachados
        ->count();
    $docspend = Doc::all()
        ->where('estado_id','=',1) //documentos Pendentes
        ->count();
    //lista de departamentos
    $destinos = Destino::all();

    $view
        ->with('nrdocs', $nrdocs)
        ->with('docs0', $docs0)
        ->with('docs1', $docs1)
        ->with('docspend', $docspend)
        ->with('destinos', $destinos)
    ;
});

//Rotas para Manual de utilizador
Route::get('manual', function () {
    return view('manual');
});

//Rotas para Baixar Minutas
Route::get('minutas', function () {
    return view('minutas');
});

//Rota para Downloads
Route::get('/download', function (){
   $file = public_path()."/Requer.jpeg";
   $headers = array(
       'content-type: application/pdf',
   );
   return Response::download($file, "Minuta Requerimento.pdf", $headers);
});


Route::resource('destinos', 'DestinoController');

Route::resource('destinoDocs', 'DestinoDocController');

Route::resource('estados', 'EstadoController');

Route::resource('destinoDocs', 'destino_docController');

Route::resource('destinoDocs', 'destino_docController');

Route::resource('destinoDocs', 'Destino_docController');
