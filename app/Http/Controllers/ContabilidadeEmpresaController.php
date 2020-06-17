<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmpresaProvider;

class ContabilidadeEmpresaController extends Controller
{
    public function importaArquivoDadosFinanceiros(Request $request) {
        $empresaProvider = new EmpresaProvider($request->id);
        $novaPontuacao = $empresaProvider->importaDadosFinanceiros($request->notas_fiscais, $request->debitos);
        return response()->json(["pontuacao"=> $novaPontuacao], 200);
    }
}
