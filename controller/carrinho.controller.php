<?php 
 require_once "model/carrinho.model.php";
 require_once "service/carrinho.service.php";
 require_once "conexao/conexao.php";

 @$acaocar = isset($_GET['acaocar'])?$_GET['acaocar']:$acaocar;
 @$idcar = isset($_GET['idcar'])?$_GET['idcar']:$idcar;
 

	 if($acaocar == 'inserir')
	 {
		$carrinho = new Carrinho();
		$carrinho->__set('id_cliente', $_POST['id_cliente']);
        $carrinho->__set('id_produto', $_POST['id_produto']);
		$carrinho->__set('quantidade', $_POST['quantidade']);
		
		$conexao = new Conexao();
		$carrinhoService = new CarrinhoService($carrinho,$conexao);
		$carrinhoService->inserir();


	}

	 if($acaocar == 'recuperar')
	 {
		 $cliente = new Cliente();
		 $conexao = new Conexao();

		 $clienteService = new ClienteService($cliente,$conexao);
		 $cliente = $clienteService->recuperar();
	 }

	 if($acaocar == 'recuperarCliente')
	 {
		 $cliente = new Cliente();
		 $conexao = new Conexao();

		 $clienteService = new ClienteService($cliente,$conexao);
		 $cliente = $clienteService->recuperarCliente($idc);
	 }

	 if($acaocar == 'excluir')
	 {
		 $cliente = new Cliente();
		 $conexao = new Conexao();

		 $cliente->__set('id',$_POST['id']);


		 $clienteService = new ClienteService($cliente,$conexao);
		 $clienteService->excluir();
	 }

	 if($acaocar == 'alterar')
	 {
		$cliente = new Cliente();
		$cliente->__set('nome', $_POST['nome']);
		$cliente->__set('email', $_POST['email']);
		$cliente->__set('endereco', $_POST['endereco']);
		$cliente->__set('senha', $_POST['senha']);
		$cliente->__set('id',$_POST['id']);
	  
		
		$conexao = new Conexao();
		$clienteService = new ClienteService($cliente,$conexao);
		$clienteService->alterar();
		header('location:index.php?link=4');
	 }

	 if($acaocar =='recuperarLoginCli'){
		$cliente = new Cliente();
		$conexao = new Conexao();
		
		$email = $_POST['email'];
		$senha = $_POST['senha'];
	
		$clienteService = new ClienteService($cliente,$conexao);
		$cliente = $clienteService->recuperarLoginCli($email,$senha);
	    print_r($cliente);
		foreach($cliente as $indice => $cliente){
		}
	
		if(!isset($cliente->email)){
			echo '<script>alert("Cliente com email desconhecido")</script>
			<meta http-equiv="refresh" content="0;url=index.php?link=10">';
		}else{
			$_SESSION['clienteLogado']=$cliente->nome;
			$_SESSION['emailLogadocli']=$cliente->email;
			$_SESSION['idLogadocli']=$cliente->id;
			header('location:index.php?link=1');
		}
	
	 }
	 if($acaocar =='sair'){
		session_destroy();
		header('location:index.php?link=1');
	 }

?>