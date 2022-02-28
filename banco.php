<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\ContaCorrente;
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\Conta\Titular;

$endereco = new Endereco('C','B','R','N');
$titular = new Titular('Luiz Fernando', '11122233344', $endereco);
$conta = new ContaCorrente($titular);

echo $conta->getEnderecoTitular();