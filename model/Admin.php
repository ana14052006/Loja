<?php
    class Admin
    {
        private $id;
        private $email;
        private $senha;
        private $nome;
        private $cpf;


        function __construct($id,$nome,$cpf,$email,$senha)
        {
            $this->id = $id;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->email = $email;
            $this->senha = $senha;
        }
        
        public function setId($id){
            $this->id = $id;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        }

        public function getId(){
            return $this->id;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getSenha(){
            return $this->senha;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getCpf(){
            return $this->cpf;
        }
        public function setCpf($cpf){
            $this->cpf = $cpf;
        }
    }    
        