<?php
    class Fornecedor
    {
        private $id;
        private $nome;
        private $loja;
      

        function __construct($id,$nome,$loja)
        {
            $this->id = $id;
            $this->nome = $nome;
            $this->loja = $loja;

        }
        
        public function setId($id)
        {
            $this->id = $id;
        }

        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        public function setLoja($loja){
            $this->loja = $loja;
        }
 
        public function getId()
        {
            return $this->id;
        }
        public function getNome()
        {
            return $this->nome;
        }

        public function getLoja()
        {
            return $this->loja;
        }

       
    }    
        