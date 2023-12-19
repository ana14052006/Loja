<?php
    
    class FornecedorDao
    {
        private $mysql;
        
        function __construct($mysql)
        {
            $this->mysql=$mysql;

        }
         
        public function cadastrar($fornecedor):void{   
            $resultado =  $this->mysql->prepare("insert into tb_fornecedor (nome, tb_loja_idtb_loja) values (?,?)");
            $resultado->bind_param('ss',$fornecedor->getNome(), $fornecedor->getLoja()->getId());
            $resultado->execute();
        }
        
        public function podeRemover(string $id):bool
        {
            $resultado = $this->mysql->prepare("select * from tb_produto where tb_fornecedor_idtb_fornecedor = ?");
            $resultado->bind_param('s',$id);
            $resultado->execute();
            if($resultado->get_result()->num_rows > 0)
                return false; // não pode
            else
                return true; // pode            
        }
        public function remover(string $id):bool
        {
            if ($this->podeRemover($id)){
                $resultado = $this->mysql->prepare
                ("delete from tb_fornecedor where idtb_fornecedor = ?");
                $resultado->bind_param('s', $id);
                $resultado->execute();
                return true;
            }
            else {
                return false;
            }    
        }

        public function alterar($fornecedor):void
        {
            $resultado = $this->mysql->prepare
            ("update tb_fornecedor set nome=?,tb_loja_idtb_loja=? where idtb_fornecedor=?");
            $resultado->bind_param('sss',$fornecedor->getNome(), $fornecedor->getLoja()->getId(), $fornecedor->getId());
            $resultado->execute();
        }


        public function buscarPorId(string $id):array
        {
            $resultado = $this->mysql->prepare
            ("select * from tb_fornecedor where idtb_fornecedor = ?");
            $resultado->bind_param('s',$id);
            $resultado->execute();
            return $resultado->get_result()->fetch_assoc(); 
        
        }
        

        

        public function buscarTodos():array
        {
            
            $resultado = $this->mysql->query("select * from tb_fornecedor");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        
      
    }

?>