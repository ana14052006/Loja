<?php
    class Cor
    {
        private $id;
        private $cor;
      
        function __construct($id,$cor)
        {
            $this->id = $id;
            $this->cor = $cor;
        }
        
        public function setId($id)
        {
            $this->id = $id;
        }

        public function setCor($cor)
        {
            $this->cor = $cor;
        }
 
        public function getId()
        {
            return $this->id;
        }
        public function getCor()
        {
            return $this->cor;
        }

       
    }    
        