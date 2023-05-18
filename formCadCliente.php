<?php 
    if(isset($_GET['metodo']))
    {
        $metodo = $_GET['metodo'];
        $idc = $_GET['idc'];
        $acaoc = 'recuperarCliente'; 
        require_once 'cliente.controller.php';
        foreach ($cliente as $key => $cliente) 
        {
            $nome = $cliente->nome;
            $endereco = $cliente->endereco;
            $email = $cliente->email;
            $senha = $cliente->senha;
            
            
            
        }
    }
?>

<div class="container">
    <h1>Cadastro de usuário</h1>
    <form name="form1" action="index.php?link=6&acaoc=<?php if(!isset($metodo)){echo 'inserir';}else if($metodo == 'alterar'){echo 'alterar';}else if($metodo == 'excluir'){echo 'excluir';}?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" name="nome" class="form-control" id="" value="<?php if(isset($nome)){echo $nome;}else{echo '';}?>">
        </div>
        <div class="form-group">
            <label for="">Endereço</label>
            <input type="text" name="endereco" class="form-control" id="" value="<?php if(isset($endereco)){echo $endereco;}else{echo '';}?>">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" id="" value="<?php if(isset($email)){echo $email;}else{echo '';}?>">
        </div>
        <div class="form-group">
            <label for="">Senha</label>
            <input type="password" name="senha" class="form-control" id="" value="<?php if(isset($senha)){echo $senha;}else{echo '';}?>">
        </div>
        <input type="hidden" name="id" value="<?php if(isset($idc)){echo $idc;}else{ echo '';}?>">
        <button type="submit" class="btn btn-primary"><?php if(!isset($metodo)){echo 'inserir';}else if($metodo == 'alterar'){echo 'alterar';}else if($metodo == 'excluir'){echo 'excluir';}?></button>
    </form>
</div>