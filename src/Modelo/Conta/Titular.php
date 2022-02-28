<?php

namespace Alura\Banco\Modelo\Conta;

use Alura\Banco\Modelo\{Pessoa, Endereco, Autenticavel};

Class Titular extends Pessoa implements Autenticavel
{   
    private Endereco $endereco;

    public function __construct(string $nome, string $cpf, Endereco $endereco)
    {
        parent::__construct($nome, $cpf); //No php nao é obrigatório, mas é interessante SEMPRE chamar
        $this->endereco = $endereco;      //o construtor da classe base
    }

//==============================================================================

    public function getEndereco()
    {
        return $this->endereco->__toString();
    }


//===============================================================================

    public function podeAutenticar(string $senha):bool
    {
        return $senha === 'abcd';
    }   

}
 