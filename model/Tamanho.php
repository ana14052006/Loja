<?php

class Tamanho
    {
        private $id;
        private $tamanho;
        

        function __construct($id,$tamanho)
        {
            $this->id = $id;
            $this->tamanho = $tamanho;
                       
        }
        
        public function setId($id)
        {
            $this->id = $id;
        }

        public function setTamanho($tamanho)
        {
            $this->tamanho = $tamanho;
        }
     
        public function getId()
        {
            return $this->id;
        }
        public function getTamanho()
        {
            return $this->tamanho;
        }     
       
    }    

?>