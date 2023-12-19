<?php

class ProdutoTamanho
    {
        private $produto;
        private $tamanho;
        

        function __construct($produto,$tamanho)
        {
            $this->produto = $produto;
            $this->tamanho = $tamanho;
                       
        }
        
        public function setProduto($produto)
        {
            $this->produto = $produto;
        }

        public function setTamanho($tamanho)
        {
            $this->tamanho = $tamanho;
        }

        public function getProduto()
        {
            return $this->produto;
        }
        public function getTamanho()
        {
            return $this->tamanho;
        }     
       
    }    

?>