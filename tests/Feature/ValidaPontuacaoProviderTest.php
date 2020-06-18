<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\ValidaPontuacaoProvider;

class ValidaPontuacaoProviderTest extends TestCase
{
    public function testValidaPontuacao() {
        $vpp = new ValidaPontuacaoProvider();

        $pontuacao = $vpp->validaPontuacao(100);
        $this->assertEquals(100, $pontuacao);

        $pontuacao = $vpp->validaPontuacao(101);
        $this->assertEquals(100, $pontuacao);

        $pontuacao = $vpp->validaPontuacao(99);
        $this->assertEquals(99, $pontuacao);

        $pontuacao = $vpp->validaPontuacao(-1);
        $this->assertEquals(1, $pontuacao);

        $pontuacao = $vpp->validaPontuacao(0);
        $this->assertEquals(1, $pontuacao);

        $pontuacao = $vpp->validaPontuacao(1);
        $this->assertEquals(1, $pontuacao);
    }
}
