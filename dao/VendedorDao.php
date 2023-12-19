<?php
    
    class VendedorDao
    {
        private $mysql;
        
        function __construct($mysql)
        {
            $this->mysql=$mysql;

        }
         
        public function cadastrar($vendedor):void{  
            $resultado =  $this->mysql->prepare("insert into tb_vendedor (nome, codigo, setor, tb_loja_idtb_loja, tb_endereco_idtb_endereco) values (?,?,?,?,?)");
            $resultado->bind_param('sssss',$vendedor->getNome(), $vendedor->getCodigo(), $vendedor->getSetor(), $vendedor->getLoja()->getId(), $vendedor->getEndereco()->getId());
            $resultado->execute();
        }
       
        public function remover(string $id):void
        {       
            $resultado = $this->mysql->prepare
            ("delete from tb_vendedor where idtb_vendedor = ?");
            $resultado->bind_param('s', $id);
            $resultado->execute();
        }

        public function alterar($vendedor):void
        {
            $resultado = $this->mysql->prepare
            ("update tb_vendedor set nome=?,codigo=?,setor=?,tb_loja_idtb_loja=?,tb_endereco_idtb_endereco=? where idtb_vendedor=?");
            $resultado->bind_param('ssssss',$vendedor->getNome(), $vendedor->getCodigo(), $vendedor->getSetor(), $vendedor->getLoja()->getId(), $vendedor->getEndereco()->getId(), $vendedor->getId());
            $resultado->execute();
        }


        public function buscarPorId(string $id):array
        {
            $resultado = $this->mysql->prepare
            ("select * from tb_vendedor where idtb_vendedor = ?");
            $resultado->bind_param('s',$id);
            $resultado->execute();
            return $resultado->get_result()->fetch_assoc(); 
        
        }       

        public function buscarTodos():array
        {
            
            $resultado = $this->mysql->query("select * from tb_vendedor");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        
      
    }

?>

