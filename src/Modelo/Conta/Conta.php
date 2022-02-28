<?php

namespace Alura\Banco\Modelo\Conta; //OBS: src é nossa pasta raiz, que nomeei de Alura\Banco

abstract Class Conta    //Para ter métodos abstratos, a classe também precisa ser abstrata
{
    private Titular $titular;     //É uma boa prática ter propriedades privadas e apenas métodos públicos
    protected float $saldo = 0;   //php 7.4: Podemos inicializar indicando o tipo

    private static $numeroDeContas = 0; //Atributo da Classe, não das Instâncias

    //Quando colocamos private(para evitar saldos negativos e outros comportamentos indesejados), não
    //conseguimos mais consultar dados como nome e CPF. Temos de fazer um método para isso.

    public function __construct(Titular $titular) //Método "mágico" do php que é chamado sempre que uma nova Conta for criada.
    {
        $this->titular = $titular;
        $this->saldo = 0;

        self::$numeroDeContas++; //Acessar Atributos/Métodos estáticos da Classe: (Nome da Classe::)
    }

    public function __destruct()
    {  
        //echo 'Conta apagada!' . PHP_EOL;
        self::$numeroDeContas --;
    }

    public function sacar(float $valorASacar):void
    {
        if($valorASacar <= 0){
            throw new \InvalidArgumentException;
        }
        $taxaSaque = $valorASacar * $this->percentualTarifa();
        $valorSaque = $valorASacar + $taxaSaque;
        if($valorSaque > $this->saldo){
            throw new SaldoInsuficienteException($valorASacar, $this->saldo);
        } 
        $this->saldo -= $valorSaque;
    }

    public function depositar(float $valorADepositar):void
    {
        if($valorADepositar < 0){
            throw new \InvalidArgumentException();
        }
        $this->saldo += $valorADepositar;
    }
    public function getEnderecoTitular()
    {
        return $this->titular->getEndereco();
    }

    public function getNomeTitular():string
    {
        return $this->titular->getNome();
    }

    public function getCpfTitular():string
    {
        return $this->titular->getCpf();
    }

    public function getSaldo():float
    {
        return $this->saldo;
    }

    public static function getNumeroDeContas():int
    {
        return self::$numeroDeContas;
    }

    abstract protected function percentualTarifa():float;

// Se eu tenho um método abstrato, todas as contas que extenderem dela
// terão que implementar. Além disso, uma classe abstrata nao pode ser criada
// diretamente, apenas a partir de classes filhas



/* Já que aprendi o método __construct(); não preciso mais desses métodos (exemplo de encapsulamento)
    public function definirCpfTitular(string $cpfTitular):string
    {
        return $this->cpfTitular = $cpfTitular;
    }

    public function definirNomeTitular(string $nomeTitular):string
    {
        return $this->nomeTitular = $nomeTitular;
    }
*/
   
}
