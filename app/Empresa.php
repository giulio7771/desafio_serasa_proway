<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public function debitos() {
        return $this->hasMany('App\Debito');
    }

    public function notasFiscais() {
        return $this->hasMany('App\NotaFiscal');
    }
}
