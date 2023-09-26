<?php
    class Loja
    {
        private $id;
        private $nome;
        private $cnpj;
        private $logotipo;
        private $admin;
        private $endereco;

        function __construct($id,$nome,$cnpj,$logotipo,$admin,$endereco)
        {
            $this->id = $id;
            $this->nome = $nome;
            $this->cnpj = $cnpj;
            $this->logotipo = $logotipo;
            $this->admin = $admin;
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

        public function setCnpj($cnpj)
        {
            $this->cnpj = $cnpj;
        }

        public function setLogotipo($logotipo)
        {
            $this->logotipo = $logotipo;
        }

        public function setAdmin($admin)
        {
            $this->admin = $admin;
        }

        public function setEndereco($endereco)
        {
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

        public function getCnpj()
        {
            return $this->cnpj;
        }

        public function getLogotipo()
        {
            return $this->logotipo;
        }

        public function getAdmin()
        {
            return $this->admin;
        }

        public function getEndereco()
        {
            return $this->endereco;
        }

       
    }    
        