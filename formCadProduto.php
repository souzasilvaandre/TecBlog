<?php 
    if(isset($_GET['metodo']))
    {
        $metodo = $_GET['metodo'];
        $idp = $_GET['idp'];
        $acaop = 'recuperarProduto';
        require_once 'produto.controller.php';
        foreach ($produto as $key => $produto) 
        {
            $descricao = $produto->descricao;
            $quantidade = $produto->quantidade;
            $custo = $produto->custo;
            $imagem = $produto->imagem;
            $id = $produto->id;
            $_SESSION['imagem'] = $imagem;
            
        }
    }
?>

<div class="container">
    <h1>Cadastro de produto</h1>
    <form name="form1" action="index.php?link=8&acaop=<?php if(!isset($metodo)){echo 'inserir';}else if($metodo == 'alterar'){echo 'alterar';}else if($metodo == 'excluir'){echo 'excluir';}?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Descrição</label>
            <input type="text" name="descricao" class="form-control" id="" value="<?php if(isset($descricao)){echo $descricao;}else{echo '';}?>">
        </div>
        <div class="form-group">
            <label for="">Quantidade</label>
            <input type="text" name="quantidade" class="form-control" id="" value="<?php if(isset($quantidade)){echo $quantidade;}else{echo '';}?>">
        </div>
        <div class="form-group">
            <label for="">Valor de Custo</label>
            <input type="text" name="custo" class="form-control" id="" value="<?php if(isset($custo)){echo $custo;}else{echo '';}?>">
        </div>
        <div class="form-group">
            <label for="">Imagem Produto</label>
            <input type="file" name="imagem" class="form-control-file" id="" >
        </div>
        <?php 
        if(isset($produto->imagem))
        {
            echo '<img src="imgProdutos/'.$imagem.'" width="40" height="40">';
        }
        ?> 
        <input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}else{ echo '';}?>">
        <button type="submit" class="btn btn-primary"><?php if(!isset($metodo)){echo 'inserir';}else if($metodo == 'alterar'){echo 'alterar';}else if($metodo == 'excluir'){echo 'excluir';}?></button>
    </form>
</div>