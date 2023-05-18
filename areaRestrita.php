<?php 
if(!isset($_SESSION['usuarioLogado'])){
    header("location:index.php?link=9");
}else{
    $acao = 'recuperar';
    require_once 'usuario.controller.php';
    $acaoc = 'recuperar';
    require_once 'cliente.controller.php';
    $acaop = 'recuperar';
    require_once 'produto.controller.php';
}

?>

<table class="table">
    <h1>Usuários</h1>
 <thead>
    <tr>
        <th scope="col">
            Nome
        </th>
        <th scope="col">
            Foto
        </th>
        <th scope="col">
           
        </th>
        <th scope="col">
            
        </th>
    </tr>
 </thead>
<?php foreach ($usuario as $key => $usuario) {?>

 <tbody>
    <tr>
        <td><?= $usuario->nome?></td>
        <td><img src="foto/<?= $usuario->foto?>" width="40" height="40"></td>
        <td><a href="index.php?link=2&metodo=alterar&id=<?= $usuario->id?>"> Alterar</a></td>
        <td><a href="index.php?link=2&metodo=excluir&id=<?= $usuario->id?>"> Excluir</a></td>
    </tr>
 </tbody>

<?php }?>
</table>
<a href="index.php?link=2">Cadastro de Usuário</a>
<hr>

<table class="table">
    <h1>Clientes</h1>
 <thead>
    <tr>
        <th scope="col">
            Nome
        </th>
        <th scope="col">
            Email
        </th>
        <th scope="col">
           
        </th>
        <th scope="col">
            
        </th>
    </tr>
 </thead>
<?php foreach ($cliente as $key => $cliente) {?>

 <tbody>
    <tr>
        <td><?= $cliente->nome?></td>
        <td><?= $cliente->email?></td>
        <td><a href="index.php?link=5&metodo=alterar&idc=<?= $cliente->id?>"> Alterar</a></td>
        <td><a href="index.php?link=5&metodo=excluir&idc=<?= $cliente->id?>"> Excluir</a></td>
    </tr>
 </tbody>

<?php }?>
</table>
<a href="index.php?link=5">Cadastro de Cliente</a>
<hr>
<table class="table">
    <h1>Produtos</h1>
 <thead>
    <tr>
        <th scope="col">
            Descrição
        </th>
        <th scope="col">
            Imagem
        </th>
        <th scope="col">
           
        </th>
        <th scope="col">
            
        </th>
    </tr>
 </thead>
<?php foreach ($produto as $key => $produto) {?>

 <tbody>
    <tr>
        <td><?= $produto->descricao?></td>
        <td><img src="imgProdutos/<?= $produto->imagem?>" width="40" height="40"></td>
        <td><a href="index.php?link=7&metodo=alterar&idp=<?= $produto->id?>"> Alterar</a></td>
        <td><a href="index.php?link=7&metodo=excluir&idp=<?= $produto->id?>"> Excluir</a></td>
    </tr>
 </tbody>

<?php }?>
</table>
<a href="index.php?link=7">Cadastro de Produto</a>