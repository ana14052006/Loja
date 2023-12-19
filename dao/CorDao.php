<?php
    
    class CorDao
    {
        private $mysql;
        
        function __construct($mysql)
        {
            $this->mysql=$mysql;

        }
         
        public function cadastrar($cor):void{   
            $resultado =  $this->mysql->prepare("insert into tb_cor (cor) values (?)");
            $resultado->bind_param('s',$cor->getCor());
            $resultado->execute();
        }


        public function remover(string $id):void
        {
            $resultado = $this->mysql->prepare
            ("delete from tb_cor where idtb_cor = ?");
            $resultado->bind_param('s', $id);
            $resultado->execute();
        }

        public function alterar($cor):void
        {
            $resultado = $this->mysql->prepare
            ("update tb_cor set cor=?, where idtb_cor=?");
            $resultado->bind_param('ss',$cor->getCor(), $cor->getId());
            $resultado->execute();
        }


        public function buscarPorId(string $id):array
        {
            $resultado = $this->mysql->prepare
            ("select * from tb_cor where idtb_cor = ?");
            $resultado->bind_param('s',$id);
            $resultado->execute();
            return $resultado->get_result()->fetch_assoc(); 
        
        }
        

        

        public function buscarTodos():array
        {
            
            $resultado = $this->mysql->query("select * from tb_cor");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        
      
    }

?>