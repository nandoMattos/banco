<?php

namespace Alura\Banco\Modelo\Conta;

class SaldoInsuficienteException extends \DomainException     // Exceção do Domínio
{
    public function __construct(float $valorSaque, float $saldoAtual)
    {
        $mensagem = "Voce tentou sacar $valorSaque, mas tem apenas $saldoAtual em conta";
        parent::__construct($mensagem);
    }
}