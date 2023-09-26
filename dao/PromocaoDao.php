<?php
    
    class PromocaoDao
    {
        private $mysql;
        
        function __construct($mysql)
        {
            $this->mysql=$mysql;

        }
         
        public function cadastrar($promocao):void
        {

        $resultado =  $this->mysql->prepare("insert into tb_promocao (descricao, periodo, banner, tb_loja_idtb_loja) values (?,?,?,?)");
            
        $resultado->bind_param('ssss',$promocao->getDescricao(), $promocao->getPeriodo(), $promocao->getBanner(), $promocao->getLoja());
  
        $resultado->execute();

        }

        public function remover(string $id):void
        {
            $resultado = $this->mysql->prepare
            ("delete from tb_promocao where idtb_promocao = ?");
            $resultado->bind_param('s', $id);
            $resultado->execute();
        }

        public function alterar($promocao):void
        {
            $resultado = $this->mysql->prepare
            ("update tb_promocao set descricao=?,periodo=?,banner=?,tb_loja_idtb_loja=? where idtb_promocao=?");
            $resultado->bind_param('sssss',$promocao->getDescricao(), $promocao->getPeriodo(), $promocao->getBanner(), $promocao->getLoja()->getId(), $promocao->getId());
            $resultado->execute();
        }


        public function buscarPorId(string $id):array
        {
            $resultado = $this->mysql->prepare
            ("select * from tb_promocao where idtb_promocao = ?");
            $resultado->bind_param('s',$id);
            $resultado->execute();
            return $resultado->get_result()->fetch_assoc(); 
        
        }
        

        

        public function buscarTodos():array
        {
            
            $resultado = $this->mysql->query("select * from tb_promocao");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        
      
    }

?>