<?php
    
    class LojaDao
    {
        private $mysql;
        
        function __construct($mysql)
        {
            $this->mysql=$mysql;

        }
         
        public function cadastrar($loja):void
        {
            $resultado =  $this->mysql->prepare("insert into tb_loja (nome, cnpj, logotipo, tb_admin_idtb_admin, tb_endereco_idtb_endereco) values (?,?,?,?,?)");      
            $resultado->bind_param('sssss',$loja->getNome(), $loja->getCnpj(), $loja->getLogotipo(), $loja->getAdmin()->getId(), $loja->getEndereco()->getId());
            $resultado->execute();

        }

        public function remover(string $id):void
        {
            $resultado = $this->mysql->prepare
            ("delete from tb_loja where idtb_loja = ?");
            $resultado->bind_param('s', $id);
            $resultado->execute();
        }

        public function alterar($loja):void
        {
            $resultado = $this->mysql->prepare
            ("update tb_loja set nome=?,cnpj=?,logotipo=?,tb_admin_idtb_admin=?,tb_endereco_idtb_endereco=? where idtb_loja=?");
            $resultado->bind_param('ssssss',$loja->getNome(), $loja->getCnpj(), $loja->getLogotipo(), $loja->getAdmin()->getId(), $loja->getEndereco()->getId(), $loja->getId());
            $resultado->execute();
        }

        public function buscarPorId(string $id):array
        {
            $resultado = $this->mysql->prepare
            ("select * from tb_loja where idtb_loja = ?");
            $resultado->bind_param('s',$id);
            $resultado->execute();
            return $resultado->get_result()->fetch_assoc(); 
        
        }
    
        public function buscarTodos():array
        {
            
            $resultado = $this->mysql->query("select * from tb_loja");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        
      
    }

?>