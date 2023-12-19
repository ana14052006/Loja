<?php
    
    class TamanhoDao
    {
        private $mysql;
        
        function __construct($mysql)
        {
            $this->mysql=$mysql;

        }

        public function insereProdutoTamanho($idProduto, $idTamanho):void
        {
            $resultado =  $this->mysql->prepare("insert into tb_produtotamanho (tb_produto_idtb_produto, tb_tamanho_idtb_tamanho) values (?,?)");      
            $resultado->bind_param('ss',$idProduto,$idTamanho);
            $resultado->execute();

        }
         
        public function cadastrar($tamanho):void
        {
            $resultado =  $this->mysql->prepare("insert into tb_tamanho (tamanho) values (?)");      
            $resultado->bind_param('s',$tamanho->getTamanho());
            $resultado->execute();
        }

        public function removerProdutoTamanho(string $id):bool
        {
            $resultado = $this->mysql->prepare("select * from tb_produtotamanho where tb_tamanho_idtb_tamanho = ?");
            $resultado->bind_param('s',$id);
            $resultado->execute();
            if($resultado->get_result()->num_rows > 0)
                return false; // não pode
            else
                return true; // pode
        }
        public function remover(string $id):bool
        {
            if ($this->removerProdutoTamanho($id)){
                $resultado = $this->mysql->prepare
                ("delete from tb_tamanho where idtb_tamanho = ?");
                $resultado->bind_param('s', $id);
                $resultado->execute();
                return true;
            }
            else {
                return false;
            }
        }

        public function alterar($tamanho):void
        {
            $resultado = $this->mysql->prepare
            ("update tb_tamanho set tamanho=? where idtb_tamanho=?");
            $resultado->bind_param('ss',$tamanho->getTamanho(),$tamanho->getId());
            $resultado->execute();
        }

        public function buscarPorId(string $id):array
        {
            $resultado = $this->mysql->prepare
            ("select * from tb_tamanho where idtb_tamanho = ?");
            $resultado->bind_param('s',$id);
            $resultado->execute();
            return $resultado->get_result()->fetch_assoc(); 
        
        }
    
        public function buscarTodos():array
        {
            
            $resultado = $this->mysql->query("select * from tb_tamanho");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }       
      
    }

?>