<?php 
    class Carrinho
    {
        private $id;
        private $id_cliente;
        private $id_produto;
        private $quantidade;
        

        public function __set($atribute, $value)
        {
            $this->$atribute = $value;
        }

        public function __get($atribute)
        {
            return $this->$atribute;
        }
        
    }

?>