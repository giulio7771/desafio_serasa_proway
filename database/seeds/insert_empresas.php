<?php

use Illuminate\Database\Seeder;
use App\Empresa;

class insert_empresas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            'nome_fantasia' => 'Gatuno Sistemas',
            'razao_social' => 'Giovanella Sistemas 489459126'
        ]);

        Empresa::create([
            'nome_fantasia' => 'Serasa Consumidor',
            'razao_social' => 'Serasa 498421618'
        ]);

        Empresa::create([
            'nome_fantasia' => 'Proway IT Training',
            'razao_social' => 'Proway 224563255'
        ]);
    }
}
