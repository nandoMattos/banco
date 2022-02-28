<?php

namespace Alura\Banco\Modelo\Conta;

use Alura\Banco\Modelo\Conta\Conta;

Class ContaCorrente extends Conta
{
    protected function percentualTarifa():float
    {
        return 0.05;
    }
    
    public function transferir(Conta $contaDestino, float $valorATransferir):void
    {
        if($valorATransferir > $this->saldo){
            echo('[ERRO]Saldo indisponível!');
            return;
        }
        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);
    }
}