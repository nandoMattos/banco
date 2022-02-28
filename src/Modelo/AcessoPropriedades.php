<?php

namespace Alura\Banco\Modelo;

trait AcessoPropriedades // Inejetar um cógido em qualquer classe
{
    public function __get(string $nomeAtributo):string
    {
        $metodo = 'get' . ucfirst($nomeAtributo);
        return $this->$metodo();
    }
}