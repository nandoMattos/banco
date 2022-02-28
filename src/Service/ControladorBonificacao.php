<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Funcionario\Funcionario;

Class ControladorBonificacao
{
    private $totalBonificacao = 0;

    public function adicionarBonificacao(Funcionario $funcionario):void
    {       
        $this->totalBonificacao += $funcionario->calcularBonificacao();  
    }   

    public function getSomaDeBonificacao():float
    {
        return $this->totalBonificacao;
    }
}