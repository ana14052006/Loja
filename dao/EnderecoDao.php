<?php
    
    class EnderecoDao
    {
        private $mysql;
        
        function __construct($mysql)
        {
            $this->mysql=$mysql;

        }

        public function maxId():array
        {
            $resultado = $this->mysql->prepare
            ("select * from tb_endereco order by idtb_endereco desc limit 1 ");
            $resultado->execute();
            return $resultado->get_result()->fetch_assoc(); 
        }
         
        public function cadastrar($endereco):void
        {

            $resultado =  $this->mysql->prepare("insert into tb_endereco (rua, numero, bairro, cep, cidade) values (?,?,?,?,?)");      
            $resultado->bind_param('sssss',$endereco->getRua(), $endereco->getNumero(), $endereco->getBairro(), $endereco->getCep(), $endereco->getCidade());
            $resultado->execute();            
        }

        public function removerEnderecoVendedor($id):bool
        {
            $resultado = $this->mysql->prepare("select * from tb_vendedor where tb_endereco_idtb_endereco = ?");
            $resultado->bind_param('s',$id);
            $resultado->execute();
            if($resultado->get_result()->num_rows > 0)
                return false; // não pode
            else
                return true; // pode

        }
        public function removerEnderecoLoja($id):bool
        {
            $resultado = $this->mysql->prepare("select * from tb_loja where tb_endereco_idtb_endereco = ?");
            $resultado->bind_param('s',$id);
            $resultado->execute();
            if($resultado->get_result()->num_rows > 0)
                return false; // não pode
            else
                return true; // pode

        }
        public function remover(string $id):bool
        {
            if (($this->removerEnderecoLoja($id)) AND ($this->removerEnderecoVendedor($id))){
                $resultado = $this->mysql->prepare
                ("delete from tb_endereco where idtb_endereco = ?");
                $resultado->bind_param('s', $id);
                $resultado->execute();
                return true;
            }
            else {
                return false;
            }
        }

        public function alterar($endereco):void
        {
            $resultado = $this->mysql->prepare
            ("update tb_endereco set rua=?,numero=?,bairro=?,cep=?,cidade=? where idtb_endereco=?");
            $resultado->bind_param('ssssss',$endereco->getRua(), $endereco->getNumero(), $endereco->getBairro(), $endereco->getCep(), $endereco->getCidade(), $endereco->getId());
            $resultado->execute();
        }


        public function buscarPorId(string $id):array
        {
            $resultado = $this->mysql->prepare
            ("select * from tb_endereco where idtb_endereco = ?");
            $resultado->bind_param('s',$id);
            $resultado->execute();
            return $resultado->get_result()->fetch_assoc(); 
        
        }

        public function buscarTodos():array
        {
            
            $resultado = $this->mysql->query("select * from tb_endereco");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        
      
    }

?>