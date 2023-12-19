<?php
    
    class ProdutoDao
    {
        private $mysql;
        
        function __construct($mysql)
        {
            $this->mysql=$mysql;

        }
         
        public function cadastrar($produto):void{   

        $resultado =  $this->mysql->prepare("insert into tb_produto(nome, preco, foto, qtd, tb_fornecedor_idtb_fornecedor) values (?,?,?,?,?)");
        $resultado->bind_param('sssss',$produto->getNome(), $produto->getPreco(), $produto->getFoto(), $produto->getQtd(), $produto->getFornecedor());
        $resultado->execute();

        }

        public function remover(string $id):void
        {
            $resultado = $this->mysql->prepare
            ("delete from tb_produto where idtb_produto = ?");
            $resultado->bind_param('s', $id);
            $resultado->execute();
        }

        public function alterar($produto):void
        {
            $resultado = $this->mysql->prepare
            ("update tb_produto set nome=?, preco=?, foto=?, qtd=?, tb_fornecedor_idtb_fornecedor=? where idtb_produto=?");
            $resultado->bind_param('ssssss',$produto->getNome(), $produto->getPreco(), $produto->getFoto(), $produto->getQtd(), $produto->getFornecedor()->getId(), $produto->getId());
            $resultado->execute();
        }


        public function buscarPorId(string $id):array
        {
            $resultado = $this->mysql->prepare
            ("select * from tb_produto where idtb_produto = ?");
            $resultado->bind_param('s',$id);
            $resultado->execute();
            return $resultado->get_result()->fetch_assoc(); 
        
        }
    
        public function buscarTodos():array
        {
            
            $resultado = $this->mysql->query("select * from tb_produto");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        
      
    }

?>