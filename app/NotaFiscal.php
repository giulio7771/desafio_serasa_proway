<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotaFiscal extends Model
{
    protected $table = 'notas_fiscais';

    public function empresa() {
        return $this->belongsTo('App\Empresa');
    }
}
