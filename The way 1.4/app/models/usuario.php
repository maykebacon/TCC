<?php

require_once "conexao.php";

class usuario
{

    public $nome;
    public $sobrenome;
    public $email;
    public $telefone;

    public function __construct($nome, $sobrenome, $email, $telefone)
    {

        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->telefone = $telefone;
    }
}