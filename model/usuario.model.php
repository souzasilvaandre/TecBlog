<?php 
    class Usuario 
    {
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $foto;

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