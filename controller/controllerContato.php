<?php
        require '../config/config.php';
        include '../model/Contato.php';
        include '../dao/ContatoDao.php';

        $btn = $_POST['btn'];

        switch ($btn)
        {
                case 'Cadastrar': cadastrar($mysql);
                break;

                case 'Cancelar': cancelar();
                break;
                
                case 'Excluir': excluir($mysql);
                break;
                
        }

        function cancelar()
        {
         
            header('Location: ../view/contato/listaContato.php');

        }

      
        function cadastrar($mysql)
        {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                $mensagem = $_POST['mensagem'];
               
                $obj = new Cor (null,$nome,$email,$telefone,$mensagem);
                $dao = new ContatoDao($mysql);
                $dao->cadastrar($obj);
                echo("<script>alert('Contato cadastrado com sucesso!!'); location.href= '../view/publica/index.php';</script>");
   
        }
    
        function excluir($mysql)
        {
                $id = $_POST['id'];                
                $dao = new ContatoDao($mysql);
                $dao->remover($id);
                header('Location: ../view/contato/listaContato.php');
                
        }

        
?>