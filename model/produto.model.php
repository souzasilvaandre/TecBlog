<?php 
    class Produto 
    {
        private $id;
        private $decricao;
        private $quantidade;
        private $custo;
        private $imagem;

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