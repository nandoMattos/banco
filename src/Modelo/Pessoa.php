<?php

namespace Alura\Banco\Modelo;

use Alura\Banco\Modelo\NomeInvalidoException;

abstract Class Pessoa
{
    use AcessoPropriedades;
    
    protected string $nome;
    protected string $cpf;

    public function __construct(string $nome, string $cpf)
    {
        $this->validarNome($nome);
        $this->nome = $nome;
        $this->validarCpf($cpf);
        $this->cpf = $cpf;
    }

    public function getNome():string
    {
        return $this->nome;
    }

    public function getCpf():string
    {
        return $this->cpf;
    }

    private function validarCpf(string $cpfTitular)
    {
        if(strlen($cpfTitular) != 11){
            throw new \InvalidArgumentException();
        }
    }

    final protected function validarNome(string $nomeTitular)
    {
        if(strlen($nomeTitular) < 4){   
            throw new NomeInvalidoException($nomeTitular);
        }
    }
}