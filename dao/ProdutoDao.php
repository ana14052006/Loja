<?php
    
    class ProdutoDao
    {
        private $mysql;
        
        function __construct($mysql)
        {
            $this->mysql=$mysql;

        }
         
        public function maxId():array
        {
            $resultado = $this->mysql->prepare
            ("select * from tb_produto order by idtb_produto desc limit 1 ");
            $resultado->execute();
            return $resultado->get_result()->fetch_assoc(); 
        }

        public function cadastrar($produto):void{   

        $resultado =  $this->mysql->prepare("insert into tb_produto(nome, preco, foto, tb_fornecedor_idtb_fornecedor, tb_loja_idtb_loja) values (?,?,?,?,?)");
        $resultado->bind_param('sssss',$produto->getNome(), $produto->getPreco(), $produto->getFoto(), $produto->getFornecedor()->getId(), $produto->getLoja()->getId());
        $resultado->execute();

        }
        public function removerTamanhoCor(string $id):void
        {
            $resultado = $this->mysql->prepare
            ("delete from tb_produtotamanhocor where tb_produtotamanho_tb_produto_idtb_produto = ?");
            $resultado->bind_param('s', $id);
            $resultado->execute();
        }
        public function removerTamanho(string $id):void
        {
            $resultado = $this->mysql->prepare
            ("delete from tb_produtotamanho where tb_produto_idtb_produto = ?");
            $resultado->bind_param('s', $id);
            $resultado->execute();
        }
        public function remover(string $id):void
        {
            $this->removerTamanhoCor($id);
            $this->removerTamanho($id);
            $resultado = $this->mysql->prepare
            ("delete from tb_produto where idtb_produto = ?");
            $resultado->bind_param('s', $id);
            $resultado->execute();
        }

        public function alterar($produto):void
        {
            $resultado = $this->mysql->prepare
            ("update tb_produto set nome=?, preco=?, foto=?, tb_fornecedor_idtb_fornecedor=? where idtb_produto=?");
            $resultado->bind_param('sssss',$produto->getNome(), $produto->getPreco(), $produto->getFoto(), $produto->getFornecedor()->getId(), $produto->getId());
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