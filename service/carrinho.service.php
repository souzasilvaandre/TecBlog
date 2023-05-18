<?php 
    class CarrinhoService 
    {
        private $carrinho;
        private $conexao;

        public function __construct(Carrinho $carrinho, Conexao $conexao)
        {
            $this->conexao = $conexao->conectar();
            $this->carrinho = $carrinho;
        }

        public function inserir()
        {
            $query = "insert into itens_produtos (id_cliente,id_produto,quantidade) 
            values (?,?,?);";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1,$this->carrinho->__get('id_cliente'));
			$stmt->bindValue(2,$this->carrinho->__get('id_produto'));
            $stmt->bindValue(3,$this->carrinho->__get('quantidade'));
            
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