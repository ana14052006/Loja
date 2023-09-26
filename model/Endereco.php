<?php
    class Endereco
    {
        private $id;
        private $rua;
        private $numero;
        private $bairro;
        private $cep;
        private $cidade;

        function __construct($id,$rua,$numero,$bairro,$cep,$cidade)
        {
            $this->id = $id;
            $this->rua = $rua;
            $this->numero = $numero;
            $this->bairro = $bairro;
            $this->cep = $cep;
            $this->cidade = $cidade;
           
        }
        
        public function setId($id)
        {
            $this->id = $id;
        }

        public function setRua($rua)
        {
            $this->rua = $ua;
        }

        public function setNumero($numero)
        {
            $this->numero = $numero;
        }

        public function setBairro($bairro)
        {
            $this->bairro = $bairro;
        }

        public function setCep($cep)
        {
            $this->cep = $cep;
        }

        public function setCidade($cidade)
        {
            $this->cidade = $cidade;
        }


        public function getId()
        {
            return $this->id;
        }
        public function getRua()
        {
            return $this->rua;
        }

        public function getNumero()
        {
            return $this->numero;
        }

        public function getBairro()
        {
            return $this->bairro;
        }

        public function getCep()
        {
            return $this->cep;
        }

        public function getCidade()
        {
            return $this->cidade;
        }

       
    }    
        