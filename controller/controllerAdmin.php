<?php
        require '../config/config.php';
        include '../model/Admin.php';
        include '../dao/AdminDao.php';
        
        $btn = $_POST['btn'];

        switch ($btn)
        {
                case 'Cadastrar': cadastrar($mysql);
                break;

                case 'Alterar': alterar($mysql);
                break;

                case 'Excluir': excluir($mysql);


                case 'Cancelar': cancelar();
                break;
                
                case 'Logar': logar($mysql);
                break;

                case 'Sair': sair($mysql);
                break;
        }

        function sair($mysql)
        {       
                session_start();
                session_destroy();
                echo("<script>alert('Voce se desconectou da nossa base.'); location.href = '../view/admin/logarAdmin.php';</script>");
        }
        function cancelar()
        {
                header("Location: ../view/admin/listaAdmin.php");
                        
        }
        function logar($mysql)
        {
        
                
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $admin = new Admin(null,$email,$senha);
                
                $dao = new AdminDao($mysql);
                if ($dao->ValidaEmailSenha($admin))
                {
                        $adm = $dao->buscarPorEmail($email);
                        session_start();
                        $_SESSION['email'] = $email;
                        $_SESSION['id'] = $adm['idtb_admin'];

                        $usuario = $dao->buscarPorEmail($email);
                        echo("<script>alert('Voce se conectou ao nosso sistema.'); location.href = '../view/admin/menu.php?opt=0';</script>");
                        
                }
                else 
                {
                // Usuário não autenticado, redireciona para a página de login com mensagem de erro
                echo("<script>alert('Não foi possível se conectar ao sistema, verifique os seus dados'); location.href = '../view/admin/logarAdmin.php?erro=1';</script>");
                }
        }
        function acessar($mysql)
        {
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $admin = new Admin(null,$email,$senha);
                
                $dao = new AdminDao($mysql);
                if ($dao->ValidaEmailSenha($user))
                {
                        session_start();
                        $_SESSION['email'] = $email;
                        header('Location: ../view/admin/menu.php');
                }
                else 
                {
                // Usuário não autenticado, redireciona para a página de login com mensagem de erro
                header('Location: ../view/admin/logaAdmin.php?erro=1');
                }
        }
        function cadastrar($mysql)
        {
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $admin = new Admin(null,$email,$senha);
                $dao = new AdminDao($mysql);
                if($dao->cadastrar($admin))
                {
                        echo("<script>alert('Admin cadastrado com sucesso!!'); location.href= '../view/admin/logarAdmin.php';</script>");
                        
                }
                else{
                        echo("<script>alert('Admin já cadastrado em nossa base, se logue em nosso sistema!!');location.href= '../view/admin/logarAdmin.php';</script>");        
                       
                }

        }
        function enviar($mysql)
        {
               
                $email = $_POST['email'];
                $senha = $_POST['senha'];
               
                
                $admin = new Admin(null,$email,$senha);
                $mysql = new mysqli('localhost', 'root','','loja');
               
                $adminDao = new AdminDao($mysql);
                $AdminDao->logar($usuario);

                header('Location: ../view/admin/menu.php');
        }

        function excluir($mysql)
        {
                $id = $_POST['id'];
                $dao = new AdminDao($mysql);
                $dao->remover($id);

                header('Location: ../view/admin/menu.php');
        }

        function alterar($mysql)
        {
                $id = $_POST['id'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                
                $admin = new Admin($id,$email,$senha);
                $dao = new AdminDao($mysql);
                $dao->alterar($admin);
                header('Location: ../view/admin/listaAdmin.php');
        }
?>