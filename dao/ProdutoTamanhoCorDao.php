<?php
    
    class ProdutoTamanhoCorDao
    {
        private $mysql;
        
        function __construct($mysql)
        {
            $this->mysql=$mysql;

        }
         
        public function insereProdutoTamanhoCor($idProduto, $idTamanho, $idCor, $qtd):void
        {
            $resultado =  $this->mysql->prepare("insert into tb_produtotamanhocor (tb_produtotamanho_tb_produto_idtb_produto,tb_produtotamanho_tb_tamanho_idtb_tamanho,tb_cor_idtb_cor,qtd) values (?,?,?,?)");      
            $resultado->bind_param('ssss',$idProduto,$idTamanho,$idCor,$qtd);
            $resultado->execute();

        }
          
        
      
    }