<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('/teste', 'API\PaymentController@process');

Route::post(
'/dados-financeiros',
'ContabilidadeEmpresaController@importaArquivoDadosFinanceiros'
);

Route::get(
    '/empresas',
    'EmpresaController@all'
);

Route::get(
    '/empresas/{id}',
    'EmpresaController@get'
);
