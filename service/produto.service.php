<?php 
    class ProdutoService 
    {
        private $produto;
        private $conexao;

        public function __construct(Produto $produto, Conexao $conexao)
        {
            $this->conexao = $conexao->conectar();
            $this->produto = $produto;
        }

        public function inserir()
        {
            $query = "insert into produtos (descricao,quantidade,custo,imagem) 
            values (?,?,?,?);";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1,$this->produto->__get('descricao'));
            $stmt->bindValue(2,$this->produto->__get('quantidade'));
            $stmt->bindValue(3,$this->produto->__get('custo'));
            $stmt->bindValue(4,$this->produto->__get('imagem'));
            
            if($stmt->execute())
            {
                $diretorio = "imgProdutos/";
                move_uploaded_file($_FILES['imagem']['tmp_name'],
                $diretorio.$this->produto->__get('imagem'));
            }
            
        }

        public function recuperar()
        {
            $query = 'select id,descricao,quantidade,custo,imagem from produtos';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function recuperarProduto($idp)
        {
            $query = 'select id,descricao,quantidade,custo,imagem from produtos where id = ?';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1,$idp);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        
        public function excluir()
        {
            $query = 'delete from produtos where id = ?';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1,$this->produto->__get('id'));
           
            if($stmt->execute())
            {
                unlink('imgProdutos\\'.$_SESSION['imagem']);
            }
        }

        public function alterar()
        {
            $query = "update produtos set descricao=?,quantidade=?,custo=?,imagem=? where id = ?";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1,$this->produto->__get('descricao'));
            $stmt->bindValue(2,$this->produto->__get('quantidade'));
            $stmt->bindValue(3,$this->produto->__get('custo'));
            $stmt->bindValue(4,$this->produto->__get('imagem'));
            $stmt->bindValue(5,$this->produto->__get('id'));
            
            if($stmt->execute())
            {
                if($_SESSION['imagem']!=$this->produto->__get('imagem'))
                {
                unlink('imgProdutos/\\'.$_SESSION['imagem']);
                $diretorio = "imgProdutos/";
                move_uploaded_file($_FILES['imagem']['tmp_name'],
                $diretorio.$this->produto->__get('imagem'));
                }
            }
            
        }
    }
?>