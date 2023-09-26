<?php
    class Vendedor
    {
        private $id;
        private $nome;
        private $codigo;
        private $setor;
        private $loja;
        private $endereco;
      

        function __construct($id,$nome,$codigo,$setor,$loja,$endereco)
        {
            $this->id = $id;
            $this->nome = $nome;
            $this->codigo = $codigo;
            $this->setor = $setor;
            $this->loja = $loja;
            $this->endereco = $endereco;

        }
        
        public function setId($id)
        {
            $this->id = $id;
        }

        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        public function setCodigo($codigo)
        {
            $this->codigo = $codigo;
        }

        public function setSetor($setor)
        {
            $this->setor = $setor;
        }

        public function setLoja($loja){
            $this->loja = $loja;
        }

        public function setEndereco($endereco){
            $this->endereco = $endereco;
        }

       
        public function getId()
        {
            return $this->id;
        }
        public function getNome()
        {
            return $this->nome;
        }

        public function getCodigo()
        {
            return $this->codigo;
        }

        public function getSetor()
        {
            return $this->setor;
        }

        public function getLoja()
        {
            return $this->loja;
        }

        public function getEndereco()
        {
            return $this->endereco;
        }

       
    }    
        