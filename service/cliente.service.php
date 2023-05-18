<?php 
    class ClienteService 
    {
        private $cliente;
        private $conexao;

        public function __construct(Cliente $cliente, Conexao $conexao)
        {
            $this->conexao = $conexao->conectar();
            $this->cliente = $cliente;
        }

        public function inserir()
        {
            $query = "insert into clientes (nome,endereco,email,senha) 
            values (?,?,?,?);";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1,$this->cliente->__get('nome'));
			$stmt->bindValue(2,$this->cliente->__get('endereco'));
            $stmt->bindValue(3,$this->cliente->__get('email'));
            $stmt->bindValue(4,$this->cliente->__get('senha'));
            $stmt->execute();
            
            
        }

        public function recuperar()
        {
            $query = 'select * from clientes';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function recuperarCliente($id)
        {
            $query = 'select * from clientes where id = ?';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1,$id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        
        public function excluir()
        {
            $query = 'delete from clientes where id = ?';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1,$this->cliente->__get('id'));
			$stmt->execute();
           
        }

        public function alterar()
        {
            $query = "update clientes set nome=?,endereco=?,email=?,senha=? where id = ?";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1,$this->cliente->__get('nome'));
			$stmt->bindValue(2,$this->cliente->__get('endereco'));
            $stmt->bindValue(3,$this->cliente->__get('email'));
            $stmt->bindValue(4,$this->cliente->__get('senha'));
			$stmt->bindValue(5,$this->cliente->__get('id'));
            $stmt->execute();
            
            
        }
        public function recuperarLoginCli($email,$senha){
            $query = 'select id,nome,email,senha,endereco 
            from clientes where email = ? and senha = ?';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1,$email);
            $stmt->bindValue(2,$senha);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ); 
        }
    }
?>