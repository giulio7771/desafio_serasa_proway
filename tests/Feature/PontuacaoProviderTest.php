<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\PontuacaoProvider;

class PontuacaoProviderTest extends TestCase
{
    public function testCalculaPontuacao() {
        $pp = new PontuacaoProvider();
        $pontuacao = $pp->obterPontuacao(3, 1);
        $this->assertEquals(51, $pontuacao);
    }
}
