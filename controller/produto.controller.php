<?php 
 require_once "model/produto.model.php";
 require_once "service/produto.service.php";
 require_once "conexao/conexao.php";
 
 @$acaop = isset($_GET['acaop'])?$_GET['acaop']:$acaop;
 @$idp = isset($_GET['idp'])?$_GET['idp']:$idp;
 

 if($acaop == 'inserir')
 {
    $produto= new Produto();
    $produto->__set('descricao', $_POST['descricao']);
    $produto->__set('quantidade', $_POST['quantidade']);
    $produto->__set('custo', $_POST['custo']);
    $produto->__set('imagem', $_FILES['imagem']['name']);
    
    $conexao = new Conexao();
    $produtoService = new ProdutoService($produto,$conexao);
    $produtoService->inserir();


 }

 if($acaop == 'recuperar')
 {
 $produto = new Produto();
 $conexao = new Conexao();

 $produtoService = new ProdutoService($produto,$conexao);
 $produto = $produtoService->recuperar();
 }

 if($acaop == 'recuperarProduto')
 {
    $produto = new Produto();
    $conexao = new Conexao();
   
    $produtoService = new ProdutoService($produto,$conexao);
    $produto = $produtoService->recuperarProduto($idp);
 }

 if($acaop == 'excluir')
 {
    $produto = new Produto();
    $conexao = new Conexao();

    $produto->__set('id',$_POST['id']);


    $produtoService = new ProdutoService($produto,$conexao);
    $produtoService->excluir();
 }

 if($acaop == 'alterar')
 {
    $produto= new Produto();
    $produto->__set('descricao', $_POST['descricao']);
    $produto->__set('quantidade', $_POST['quantidade']);
    $produto->__set('custo', $_POST['custo']);
    
    if($_FILES['imagem']['name'] != '')
    {
      $produto->__set('imagem', $_FILES['imagem']['name']);
    }
    else 
    {
      $produto->__set('imagem', $_SESSION['imagem']);
    }
    $produto->__set('id',$_POST['id']);
  
    
    $conexao = new Conexao();
    $produtoService = new ProdutoService($produto,$conexao);
    $produtoService->alterar();
    header('location:index.php?link=4');


 }

?>