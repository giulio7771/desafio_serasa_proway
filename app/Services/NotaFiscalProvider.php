<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use App\Services\{
    ConfiabilidadePontuacaoInterface
};

class NotaFiscalProvider implements ConfiabilidadePontuacaoInterface
{
    public function __constructor() {
        $this->arredondamentoProvider = new ArredondamentoProvider();
    }

    public function obterPontuacao($qtd, $pontuacaoInicial){
        $pontuacao = $pontuacaoInicial;
        for ($i=0; $i < $qtd; $i+=1) {
            $acresimo = $pontuacao * 0.02;
            $pontuacao = floor($pontuacao + $acresimo);
        }
        return $pontuacao;
    }
}
