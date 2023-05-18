<?php
    $id_cliente = $_GET["idCliente"];
    $id_produto = $_GET["id_produto"];
    $descricao = $_GET["descricao"];
    $valorVenda = $_GET["valorVenda"];
    $imagem = $_GET["imagem"];
?>
<div class="container">
  <div class="row">
    <div class="col">
    <img src="imgProdutos/<?= $imagem; ?>" class="img-thumbnail" alt="...">
    </div>
    <div class="col">
    <div class="container">
    
    <form name="form1" action="index.php?link=14&acaocar=inserir" method="post" enctype="multipart/form-data">
       <h3> <?= $descricao ?><br></h3>
       <div class="text-danger"><h1> R$ <?= $valorVenda?></h1></div>
        <input type="hidden" name="id_cliente" value="<?= $id_cliente;?>">
        <input type="hidden" name="id_produto" value="<?= $id_produto;?>">
        <select class="form-select" name="quantidade" aria-label="Default select example">
            <option selected></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select><br>
        <br><br><br><br>
        <button type="submit" class="btn btn-primary">Carrinho de compra</button>
    </form>
</div>
    </div>
  </div>
</div>