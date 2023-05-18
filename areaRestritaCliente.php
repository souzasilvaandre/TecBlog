<?php 
if(!isset($_SESSION['clienteLogado'])){
    header("location:index.php?link=9");
}else{
    $acaoc = 'recuperarCliente';
    $idc = $_SESSION['idLogadocli'];
    require_once 'cliente.controller.php';
}

?>
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
