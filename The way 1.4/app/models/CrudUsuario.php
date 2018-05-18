<?php

 require_once "conexao.php";

 require_once "usuario.php";

class Crudusuario
{
    private $conexao;
    public $usuario;

    //CONEXÃO COM O BANCO
    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }

    //Cadastra o usuario
    public function salvar(usuario $usuario){
        $sql = "INSERT INTO tb_usuario (nome, sobrenome, email, telefone) VALUES ($usuario->nome, $usuario->sobrenome, $usuario->email, $usuario->telefone)";
        $this->conexao->exec($sql);
    }

    //Busca
    public function getusuario(int $cod_usuario)
    {
        $consulta = $this->conexao->query("SELECT * FROM usuario WHERE cod_usuario = $cod_usuario");
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC); //SEMELHANTES JSON ENCODE E DECODE
        return new usuario($usuario['nome'], $usuario['sobrenome'], $usuario['email'], $usuario['cod_usuario']);
    }

    /*public function getusuarios(){
        $consulta = $this->conexao->query("SELECT * FROM usuarios");
        $arrayusuarios = $consulta->fetchAll(PDO::FETCH_ASSOC);
        //Fabrica de usuario
        $listausuario = [];
        foreach ($arrayusuarios as $usuarios){
            $listausuario[] = new usuario($usuarios['nome'], $usuarios['sobrenome'], $usuarios['email'],$usuarios['quantidade_telefone'], $usuarios['cod_usuario']);
        }
        return $listausuarios;
    }*/

    //Exclui o usuario
    public function excluirusuario(int $x)
    {
        $this->conexao->exec("DELETE from td_usuario where cod_usuario = $x");
    }

    //Edita as informações do usuario
    public function editar($id, $nome, $email, $sobrenome, $telefone)
    {
        $this->conexao->exec("UPDATE tb_usuario SET nome = $nome, email = $email, sobrenome = $sobrenome, telefone = $telefone WHERE usuario.cod_usuario = $id; ");
    }
}



