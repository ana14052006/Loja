<?php
    
    class ContatoDao
    {
        private $mysql;
        
        function __construct($mysql)
        {
            $this->mysql=$mysql;

        }
         
        public function cadastrar($contato):void
        {
            $resultado =  $this->mysql->prepare("insert into tb_contato (nome, email, telefone, mensagem) values (?,?,?,?)");      
            $resultado->bind_param('ssss',$contato->getNome(),$contato->getEmail(),$contato->getTelefone(),$contato->getMensagem());
            $resultado->execute();

        }

        
        public function remover(string $id):void
        {            
            $resultado = $this->mysql->prepare
            ("delete from tb_contato where idtb_contato = ?");
            $resultado->bind_param('s', $id);
            $resultado->execute();            
        }
        
        public function buscarPorId(string $id):array
        {
            $resultado = $this->mysql->prepare
            ("select * from tb_contato where idtb_contato = ?");
            $resultado->bind_param('s',$id);
            $resultado->execute();
            return $resultado->get_result()->fetch_assoc(); 
        
        }
    
        public function buscarTodos():array
        {            
            $resultado = $this->mysql->query("select * from tb_contato");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }       
      
    }

?>