<?php

namespace App\Services;

use App\Services\{
    ConfiabilidadePontuacaoInterface
};

class DebitoProvider implements ConfiabilidadePontuacaoInterface
{
    public function __constructor() {
        $this->arredondamentoProvider = new ArredondamentoProvider();
    }

    public function obterPontuacao($qtd, $pontuacaoInicial){
        $pontuacao = $pontuacaoInicial;
        for ($i=0; $i < $qtd; $i+=1) {
            $decresimo = $pontuacao * 0.04;
            $pontuacao = ceil($pontuacao - $decresimo);
        }
        return $pontuacao;
    }
}
