<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\DebitoProvider;

class DebitoProviderTest extends TestCase
{
    public function testCalculaPontuacaoDebito() {
        $dp = new DebitoProvider();
        $pontuacao = $dp->obterPontuacao(1, 53);
        $this->assertEquals(51, $pontuacao);
    }
}
