<?php
        require '../config/config.php';
        include '../model/Tamanho.php';
        include '../dao/TamanhoDao.php';

        $btn = $_POST['btn'];

        switch ($btn)
        {
                case 'Cadastrar': cadastrar($mysql);
                break;

                case 'Cancelar': cancelar();
                break;
                
                case 'Excluir': excluir($mysql);
                break;

                case 'Alterar': alterar($mysql);
                break;
        }

        function cancelar()
        {
         
            header('Location: ../view/tamanho/listaTamanho.php');

        }

      
        function cadastrar($mysql)
        {
                $tamanho = $_POST['tamanho'];
               
                $obj = new Tamanho (null,$tamanho);
                $dao = new TamanhoDao($mysql);
                $dao->cadastrar($obj);
                echo("<script>alert('Tamanho cadastrado com sucesso!!'); location.href= '../view/tamanho/listaTamanho.php';</script>");
   
        }
    
        function excluir($mysql)
        {
                $id = $_POST['id'];
                $dao = new TamanhoDao($mysql);
                if ($dao->remover($id)) {
                    header('Location: ../view/tamanho/listaTamanho.php');
                }
                else {
                        echo("<script>alert('O tamanho não pode ser removido!!'); location.href= '../view/tamanho/listaTamanho.php';</script>"); 
                }
        }

        function alterar($mysql)
        {
                $id = $_POST['id'];
                $tamanho = $_POST['tamanho'];                
                $obj = new Tamanho ($id,$tamanho);
                $dao = new TamanhoDao($mysql);
                $dao->alterar($obj);
                header('Location: ../view/tamanho/listaTamanho.php');
        }
?>