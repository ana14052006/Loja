<?php
    class Promocao
    {
        private $id;
        private $descricao;
        private $periodo;
        private $banner;
        private $loja;

        function __construct($id,$descricao,$periodo,$banner,$loja)
        {
            $this->id = $id;
            $this->descricao = $descricao;
            $this->periodo = $periodo;
            $this->banner = $banner;
            $this->loja = $loja;
        }
        
        public function setId($id){
            $this->id = $id;
        }
        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }
        public function setPeriodo($periodo){
            $this->periodo = $periodo;
        }
        public function setBanner($banner){
            $this->banner = $banner;
        }
        public function setLoja($loja){
            $this->loja = $loja;
        }

        public function getId()
        {
            return $this->id;
        }
        public function getDescricao()
        {
            return $this->descricao;
        }
        public function getPeriodo()
        {
            return $this->periodo;
        }
        public function getBanner()
        {
            return $this->banner;
        }
        public function getLoja()
        {
            return $this->loja;
        }
    }    
        