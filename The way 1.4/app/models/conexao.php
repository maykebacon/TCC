<?php

class Conexao {
    const HOST      = "localhost";
    const NOMEBANCO = "TheWay";
    const USUARIO   = "root";
    const SENHA     = "root";
    //!!!Substitua daqui para baixo
    public static $conexao = null;
    public static function getConexao(){
        
        try{
             if(self::$conexao == null){
                      
                      $dbHost=self::localhost;
                      $dbName=self::TheWay;
                      $dbUser=self::root;
                      $dbPass=self::root;
                self::$conexao = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            
            return self::$conexao;
            
        }catch(PDOException $e){
            die("Falhou a conexao ou ocorreu um erro banco: " . $e->getMessage()); 
        }
        return $conexao;
    }
}
//teste conexao
//$con = new Conexao();
//$con->getConexao();