<?php

namespace Alura\Banco\Modelo\Funcionario; //Classes separadas em namespaces (pacotes)

use Alura\Banco\Modelo\Pessoa;

abstract Class Funcionario extends Pessoa
{
    protected float $salario;

    public function __construct(string $nome, string $cpf, float $salario)
    {
        parent::__construct($nome, $cpf);
        $this->salario = $salario;
    }

    public function alterarNome(string $nome):void
    {
        $this->validarNomeTitular($nome);
        $this->nome = $nome;
    }

    public function getSalario():float
    {
        return $this->salario;
    }
    
    public function receberAumento(float $valorDeAumento):void
    {
        if($valorDeAumento < 0 ){
            echo '[ERRO]Aumento deve ser positivo!';
            return;
        }
        $this->salario += $valorDeAumento;
    }

    abstract public function calcularBonificacao():float;
}