<?php

class Contato
    {
        private $id;
        private $nome;
        private $email;
        private $telefone;
        private $mensagem;
        

        function __construct($id,$nome,$email,$telefone,$mensagem)
        {
            $this->id = $id;
            $this->nome = $nome;
            $this->email = $email;
            $this->telefone = $telefone;
            $this->mensagem = $mensagem;                       
        }
        
        public function setId($id)
        {
            $this->id = $id;
        }

        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }
        public function setTelefone($telefone)
        {
            $this->telefone = $telefone;
        }
        public function setMensagem($mensagem)
        {
            $this->mensagem = $mensagem;
        }     
        public function getId()
        {
            return $this->id;
        }
        public function getNome()
        {
            return $this->nome;
        }  
        public function getEmail()
        {
            return $this->email;
        }  
        public function getTelefone()
        {
            return $this->telefone;
        }  
        public function getMensagem()
        {
            return $this->mensagem;
        }     
       
    }    

?>