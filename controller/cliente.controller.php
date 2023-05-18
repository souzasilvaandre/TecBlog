<?php 
 require_once "model/cliente.model.php";
 require_once "service/cliente.service.php";
 require_once "conexao/conexao.php";

 @$acaoc = isset($_GET['acaoc'])?$_GET['acaoc']:$acaoc;
 @$idc = isset($_GET['idc'])?$_GET['idc']:$idc;
 

	 if($acaoc == 'inserir')
	 {
		$cliente = new Cliente();
		$cliente->__set('nome', $_POST['nome']);
        $cliente->__set('endereco', $_POST['endereco']);
		$cliente->__set('email', $_POST['email']);
		$cliente->__set('senha', $_POST['senha']);
		
		$conexao = new Conexao();
		$clienteService = new ClienteService($cliente,$conexao);
		$clienteService->inserir();


	}

	 if($acaoc == 'recuperar')
	 {
		 $cliente = new Cliente();
		 $conexao = new Conexao();

		 $clienteService = new ClienteService($cliente,$conexao);
		 $cliente = $clienteService->recuperar();
	 }

	 if($acaoc == 'recuperarCliente')
	 {
		 $cliente = new Cliente();
		 $conexao = new Conexao();

		 $clienteService = new ClienteService($cliente,$conexao);
		 $cliente = $clienteService->recuperarCliente($idc);
	 }

	 if($acaoc == 'excluir')
	 {
		 $cliente = new Cliente();
		 $conexao = new Conexao();

		 $cliente->__set('id',$_POST['id']);


		 $clienteService = new ClienteService($cliente,$conexao);
		 $clienteService->excluir();
	 }

	 if($acaoc == 'alterar')
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

	 if($acaoc =='recuperarLoginCli'){
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
	 if($acaoc =='sair'){
		session_destroy();
		header('location:index.php?link=1');
	 }

?>