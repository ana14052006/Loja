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
                break;


                case 'Cancelar': cancelar();
                break;
                
                case 'Logar': logar($mysql);
                break;

                case 'Sair': sair($mysql);
                break;
        }

        function sair($mysql)
        {       
                header("Location: ../view/admin/logout.php"); 
        }
        function cancelar()
        {
                header("Location: ../view/admin/main.php");
                        
        }
        function logar($mysql)
        {       
                
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $admin = new Admin(null,null,null,$email,$senha);
                
                $dao = new AdminDao($mysql);
                if ($dao->ValidaEmailSenha($admin))
                {
                        $adm = $dao->buscarPorEmail($email);
                        session_start();
                        $_SESSION['email'] = $email;
                        $_SESSION['id'] = $adm['idtb_admin'];
                        $_SESSION['nome'] = $adm['nome'];
                        $_SESSION['cpf'] = $adm['cpf'];

                        echo("<script>alert('Voce se conectou ao nosso sistema.'); location.href = '../view/admin/main.php?opt=0';</script>");
                        
                }
                else 
                {
                // Usuário não autenticado, redireciona para a página de login com mensagem de erro
                echo("<script>alert('Não foi possível se conectar ao sistema, verifique os seus dados'); location.href = '../view/admin/logarAdmin.php?erro=1';</script>");
                }
        }
        
        function cadastrar($mysql)
        {
                $nome = $_POST['nome'];
                $cpf = $_POST['cpf'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $admin = new Admin(null,$nome,$cpf,$email,$senha);
                $dao = new AdminDao($mysql);
                if($dao->cadastrar($admin))
                {
                        echo("<script>alert('Admin cadastrado com sucesso!!'); location.href= '../view/admin/logarAdmin.php';</script>");
                        
                }
                else{
                        echo("<script>alert('Admin já cadastrado em nossa base, se logue em nosso sistema!!');location.href= '../view/admin/logarAdmin.php';</script>");        
                       
                }

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
                $nome = $_POST['nome'];
                $cpf = $_POST['cpf'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                
                $admin = new Admin($id,$nome,$cpf,$email,$senha);
                $dao = new AdminDao($mysql);
                $dao->alterar($admin);
                header('Location: ../view/admin/listaAdmin.php');
        }
?>