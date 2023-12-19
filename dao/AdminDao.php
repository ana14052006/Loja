<?php
    
    class AdminDao
    {
        private $mysql;
        
        function __construct($mysql)
        {
            $this->mysql=$mysql;

        }

        public function existeAdmin($admin):bool
        {
            
            $resultado = $this->mysql->prepare("select * from tb_admin where email = ?");
            $resultado->bind_param('s',$admin->getEmail());
            $resultado->execute();
            if($resultado->get_result()->num_rows > 0)
                return true;
            else
                return false;
        }

       
        public function cadastrar($admin):bool
        {
            
            if (!($this->existeAdmin($admin)))
                {
                    $resultado = $this->mysql->prepare("insert into tb_admin (nome,cpf,email, senha) values (?,?,?,?)");
                    $resultado->bind_param('ssss', $admin->getNome(), $admin->getCpf(),$admin->getEmail(), $admin->getSenha());
                    $resultado->execute();
                    return true;

                }
                else 
                {
                    return false;
                }
        }

        public function remover(string $id):void
        {
            
            $resultado = $this->mysql->prepare
            ("delete from tb_admin where idtb_admin = ?");
            $resultado->bind_param('s', $id);
            $resultado->execute();
       
        }

        public function alterar($admin):void
        {
            
            $resultado = $this->mysql->prepare
            ("update tb_admin set nome=?, cpf=?,email=?, senha=? where idtb_admin=?");
            $resultado->bind_param('sssss', $admin->getNome(),$admin->getCpf(),$admin->getEmail(), $admin->getSenha(), $admin->getId());
            $resultado->execute();
        
        }

        public function buscarPorId(string $id):array
        {

            $resultado = $this->mysql->prepare
            ("select * from tb_admin where idtb_admin = ?");
            $resultado->bind_param('s',$id);
            $resultado->execute();
            return $resultado->get_result()->fetch_assoc(); 
        
        }

        
        public function buscarPorEmail(string $email):array
        {

            $resultado = $this->mysql->prepare
            ("select * from tb_admin where email = ?");
            $resultado->bind_param('s',$email);
            $resultado->execute();
            return $resultado->get_result()->fetch_assoc(); 
        }

        public function buscarTodos():array
        {
            
            $resultado = $this->mysql->query("select * from tb_admin");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        
        }

        public function validaEmailSenha($admin): bool
        {
            $resultado = $this->mysql->prepare("select * from tb_admin where email = ? AND senha = ?");
            $resultado->bind_param('ss', $admin->getEmail(), $admin->getSenha());
            $resultado->execute();

            if($resultado->get_result()->num_rows > 0)
                return true;
            else
                return false;
       }

    
    }