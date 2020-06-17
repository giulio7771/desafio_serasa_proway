<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaFiscal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_fiscais', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable(true);
            $table->float('valor')->nullable(true);
            $table->unsignedBigInteger('empresa_id');
            $table->timestamps();
        });

        Schema::table('notas_fiscais', function($table){
            $table->foreign("empresa_id")->references('id')
                    ->on('empresas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas_fiscais');
    }
}
