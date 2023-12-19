<?php
    class Produto
    {
        private $id;
        private $nome;
        private $preco;
        private $foto;
        private $fornecedor;
        private $loja;

      

        function __construct($id,$nome,$preco,$foto,$fornecedor,$loja)
        {
            $this->id = $id;
            $this->nome = $nome;
            $this->preco = $preco;
            $this->foto = $foto;
            $this->fornecedor = $fornecedor;
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

        public function setPreco($preco){
            $this->preco = $preco;
        }

        
        public function setFoto($foto){
            $this->foto = $foto;
        }

        public function setFornecedor($fornecedor){
            $this->fornecedor = $fornecedor;
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

        public function getPreco()
        {
            return $this->preco;
        }

        public function getFoto()
        {
            return $this->foto;
        }

        public function getFornecedor()
        {
            return $this->fornecedor;
        }
        public function getLoja()
        {
            return $this->loja;
        }

       
    }    
        