<?php

namespace App\Services;

use App\{ Empresa, NotaFiscal, Debito };
use App\Services\{ PontuacaoProvider };

class EmpresaProvider
{
    public function __construct($empresa_id) {
        $this->empresa = Empresa::find($empresa_id);
        $this->pontuacaoProvider = new PontuacaoProvider($empresa_id);
    }

    public function importaDadosFinanceiros($qtdNotasFiscais, $qtdDebitos) {
        $qtdNotasFiscaisTotais =$this->insereNotasFiscais($qtdNotasFiscais);
        $qtdDebitosTotais = $this->insereDebitos($qtdDebitos);
        $pontuacaoFinal = $this->pontuacaoProvider->obterPontuacao($qtdNotasFiscaisTotais, $qtdDebitosTotais);
        $this->empresa->confiabilidade = $pontuacaoFinal;
        $this->empresa->save();
        return $pontuacaoFinal;
    }

    private function insereNotasFiscais($qtdNotasFiscais) {
        $empresaNotasFiscais = $this->empresa->notasFiscais->count();
        for($i=0; $i < $qtdNotasFiscais; $i+=1){
            $empresaNotasFiscais += 1;
            $notaFiscal = new NotaFiscal();
            $notaFiscal->titulo = "Nota Fiscal $empresaNotasFiscais";
            $notaFiscal->valor = $empresaNotasFiscais * 1000;
            $notaFiscal->empresa()->associate($this->empresa);
            $notaFiscal->save();
        }
        return $empresaNotasFiscais;
    }

    private function insereDebitos($qtdDebitos) {
        $empresaDebitos = $this->empresa->debitos->count();
        for($i=0; $i < $qtdDebitos; $i+= 1){
            $empresaDebitos += 1;
            $debito = new Debito();
            $debito->titulo = "Nota Fiscal $empresaDebitos";
            $debito->valor = $empresaDebitos * 1000;
            $debito->empresa()->associate($this->empresa);
            $debito->save();
        }
        return $empresaDebitos;
    }

}
