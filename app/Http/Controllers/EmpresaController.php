<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Http\Resources\EmpresaResource;

class EmpresaController extends Controller
{
    public function all() {
        $empresas = Empresa::orderBy('confiabilidade', 'desc')->get();
        return response()->json(EmpresaResource::collection($empresas), 200);
    }

    public function get(Request $request, $id) {
        $empresa = Empresa::find($id);
        return response()->json(new EmpresaResource($empresa));
    }
}
