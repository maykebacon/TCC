<?php
// O Controlador é a peça de código que sabe qual classe chamar, para onde redirecionar e etc.
// Use o método $_GET para obter informações vindas de outras páginas.
//faça um require_once para o arquivo usuario.php

require_once "../models/usuario.php";

require_once "../models/CrudUsuario.php";

   //quando um valor da URL for igual a cadastrar faça isso
  if ($_GET['usuario']  == 'cadastrar'){
      $usuario = new usuario($_POST['nome'],$_POST['sobrenome'],$_POST['email'], $_POST['telefone']);
      $crud = new Crudusuario(); //crie um objeto $crud
      $crud->salvar($usuario);
      header("Location: ../views/usuario.php");
  }

     //quando um valor da URL for igual a editar faça isso
    if ( $_GET['usuario'] == 'editar'){
      if(!$_GET['editado']){//algoritmo para editar
          session_start();
          $crud = new Crudusuario();
          $_SESSION['usuario'] = $crud->buscarUsuario($_GET['cod_usuario']);
          header("Location: ../views/editarUsuario.php");
        }elseif ($_GET['editado']){
          $crud = new Crudusuario();
          $editado = [
            'nome'        => $_POST['nome'],
            'sobrenome'   => $_POST['sobrenome'],
            'email'       => $_POST['email'],
            'telefone'    => $_POST['telefone'],
            'cod_usuario' => $_GET ['cod_usuario']
           ];
          $crud->editar($editado);
          session_destroy();
          //redirecione para a página de usuarios
          header("Location: ../views/usuario.php");
      }
  }

//quando um valor da URL for igual a excluir faça isso
if ($_GET['usuario'] == 'excluir'){
    //algoritmo para excluir
    $crud = new Crudusuario();
    $crud->excluir($_GET['cod_usuario']);
    //redirecione para a página de usuarios
    header("Location: ../views/usuario.php");
}

/*if ($_GET['usuario'] == 'vender'){
    //algoritmo para excluir
    $crud = new Crudusuario();
    $crud->vendeusuario($_POST['qtd'],$_GET['id']);
    print_r([$_POST['qtd'],$_GET['id']]);
    //redirecione para a página de usuarios
    header("Location: ../../index.php");
}*/