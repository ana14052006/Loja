<?php
    
    class ProdutoTamanhoDao
    {
        private $mysql;
        
        function __construct($mysql)
        {
            $this->mysql=$mysql;

        }
         
        public function buscarTodosProdutos(string $produto):array
        {
            
            $resultado = $this->mysql->query("select * from tb_produtotamanho where tb_produto_idtb_produto = $produto");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
          
        
      
    }

?>