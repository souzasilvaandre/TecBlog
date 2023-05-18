
<?php
    if(isset($_SESSION["idLogadocli"])){
    $acaop = "recuperar";
    require_once "produto.controller.php"; 
    }else{
      header("location: index.php?link=10");
    }   
?>

<div class="row d-flex justify-content-center">
<?php foreach ($produto as $key => $produto) { ?>
<div class="card" style="width: 18rem;">
  <img src="imgProdutos/<?= $produto->imagem; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $produto->custo * 1.8; ?></h5>
    <p class="card-text"><?= $produto->descricao; ?></p>
    <a href="index.php?link=13&idCliente=<?= $_SESSION["idLogadocli"] ?>
    &id_produto=<?= $produto->id;?>
    &imagem=<?= $produto->imagem;?>
    &valorVenda=<?= $produto->custo * 1.8; ?>
    &descricao=<?= $produto->descricao;?>" class="btn btn-primary">Comprar</a>
  </div>
</div>
<?php } ?>
</div>
