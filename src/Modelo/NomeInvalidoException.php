<?php

namespace Alura\Banco\Modelo;

class NomeInvalidoException extends \DomainException
{
    public function __construct(string $nome)
    {
        $mensagem = 'Nome deve conter ao menos 5 caracteres.';
        parent::__construct($mensagem);
    }
}