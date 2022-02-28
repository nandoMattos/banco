<?php

namespace Alura\Banco\Modelo;

final Class Endereco
{
    use AcessoPropriedades;     // Colocar dentro da classe significa q está usando uma trait
    private string $cidade;     // É possível adicionar quantas traits quiser
    private string $bairro;
    private string $rua;
    private string $numero;

    public function __construct(string $cidade, string $bairro, string $rua, string $numero)
    {
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->numero = $numero;
    }

//===================================================================================================

    public function __toString():string // Método mágico do PHP 
    {
        return "{$this->rua}, {$this->numero}, {$this->bairro}, {$this->cidade}";
    }



//===================================================================================================

    public function getCidade()
    {
        return $this->cidade;
    }
    public function getBairro()
    {
        return $this->bairro;
    }
    public function getRua()
    {
        return $this->rua;
    }
    public function getNumero()
    {
        return $this->numero;
    }
}
