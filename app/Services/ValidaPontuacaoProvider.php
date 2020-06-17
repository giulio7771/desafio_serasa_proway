<?php

namespace App\Services;


class ValidaPontuacaoProvider
{
    public function validaPontuacao($pontuacao) {
        if ($pontuacao > 100) {
            return 100;
        } else if ($pontuacao < 1) {
            return 1;
        } else {
            return $pontuacao;
        }
    }
}
