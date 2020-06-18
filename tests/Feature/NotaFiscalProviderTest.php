<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\NotaFiscalProvider;

class NotaFiscalProviderTest extends TestCase
{
    public function testCalculaPontuacaoNotaFiscal() {
        $nfp = new NotaFiscalProvider();
        $pontuacao = $nfp->obterPontuacao(3, 50);
        $this->assertEquals(53, $pontuacao);
    }
}
