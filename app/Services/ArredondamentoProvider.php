<?php

namespace App\Services;

class ArredondamentoProvider
{
    public function arredondarParaBaixo($valor) {
        return ceil($valor);
    }
}
