<?php

namespace Alura\Banco\Modelo\Funcionario;

Class Desenvolvedor extends Funcionario
{
    public function calcularBonificacao():float
    {
        return $this->salario * 0.05;
    }

    public function subirDeNivel()
    {
        $this->receberAumento($this->getSalario() * 0.75);
    }
}