<?php

namespace App\Services;

use App\Services\{
    NotaFiscalProvider,
    DebitoProvider,
    ValidaPontuacaoProvider
};

class PontuacaoProvider
{
    public function __construct() {
        $this->notaFiscalProvider = new NotaFiscalProvider();
        $this->debitoProvider = new DebitoProvider();
        $this->validaPontuacaoProvider = new ValidaPontuacaoProvider();
    }

    public function obterPontuacao($qtdNotasFiscais, $qtdDebitos) {
        $notaFiscalPontuacao = $this->notaFiscalProvider->obterPontuacao($qtdNotasFiscais, 50);
        $debitoPontuacao = $this->debitoProvider->obterPontuacao($qtdDebitos, $notaFiscalPontuacao);
        $pontuacaoFinal = $this->validaPontuacaoProvider->validaPontuacao($debitoPontuacao);
        return $pontuacaoFinal;
    }

}
