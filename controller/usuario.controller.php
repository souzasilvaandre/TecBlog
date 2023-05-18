<?php 
 require_once "model/usuario.model.php";
 require_once "service/usuario.service.php";
 require_once "conexao/conexao.php";
 
 @$acao = isset($_GET['acao'])?$_GET['acao']:$acao;
 @$id = isset($_GET['id'])?$_GET['id']:$id;
 

 if($acao == 'inserir')
 {
    $usuario = new Usuario();
    $usuario->__set('nome', $_POST['nome']);
    $usuario->__set('email', $_POST['email']);
    $usuario->__set('senha', $_POST['senha']);
    $usuario->__set('foto', $_FILES['foto']['name']);
    
    $conexao = new Conexao();
    $usuarioService = new UsuarioService($usuario,$conexao);
    $usuarioService->inserir();


 }

 if($acao == 'recuperar')
 {
 $usuario = new Usuario();
 $conexao = new Conexao();

 $usuarioService = new UsuarioService($usuario,$conexao);
 $usuario = $usuarioService->recuperar();
 }

 if($acao == 'recuperarUsuario')
 {
 $usuario = new Usuario();
 $conexao = new Conexao();

 $usuarioService = new UsuarioService($usuario,$conexao);
 $usuario = $usuarioService->recuperarUsuario($id);
 }

 if($acao == 'excluir')
 {
 $usuario = new Usuario();
 $conexao = new Conexao();

 $usuario->__set('id',$_POST['id']);


 $usuarioService = new UsuarioService($usuario,$conexao);
 $usuarioService->excluir();
 }

 if($acao == 'alterar')
 {
    $usuario = new Usuario();
    $usuario->__set('nome', $_POST['nome']);
    $usuario->__set('email', $_POST['email']);
    $usuario->__set('senha', $_POST['senha']);
    
    if($_FILES['foto']['name'] != '')
    {
      $usuario->__set('foto', $_FILES['foto']['name']);
    }
    else 
    {
      $usuario->__set('foto', $_SESSION['foto']);
    }
    $usuario->__set('id',$_POST['id']);
  
    
    $conexao = new Conexao();
    $usuarioService = new UsuarioService($usuario,$conexao);
    $usuarioService->alterar();
    header('location:index.php?link=4');
 }
 if($acao =='recuperarLoginUs'){
    $usuario = new Usuario();
    $conexao = new Conexao();

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuarioService = new UsuarioService($usuario,$conexao);
    $usuario = $usuarioService->recuperarLoginUs($email,$senha);

    foreach($usuario as $indice => $usuario){
    }

    if(!isset($usuario->email)){
        echo '<script>alert("Usuário com email desconhecido")</script>
        <meta http-equiv="refresh" content="0;url=index.php?link=9">';
    }else{
        $_SESSION['usuarioLogado']=$usuario->nome;
        $_SESSION['emailLogado']=$usuario->email;
        $_SESSION['idLogado']=$usuario->id;
        header('location:index.php?link=1');
    }

 }
 if($acao =='sair'){
    session_destroy();
    header('location:index.php?link=1');
 }

?>