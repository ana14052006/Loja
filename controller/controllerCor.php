<?php
        require '../config/config.php';
        include '../model/Cor.php';
        include '../dao/CorDao.php';

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
         
            header('Location: ../view/cor/listaCor.php');

        }

      
        function cadastrar($mysql)
        {
                $cor = $_POST['cor'];
               
                $obj = new Cor (null,$cor);
                $dao = new CorDao($mysql);
                $dao->cadastrar($obj);
                echo("<script>alert('Cor cadastrada com sucesso!!'); location.href= '../view/cor/listaCor.php';</script>");
   
        }
    
        function excluir($mysql)
        {
                $id = $_POST['id'];                
                $dao = new CorDao($mysql);

                if ($dao->remover($id)) {
                        header('Location: ../view/cor/listaCor.php');
                }
                else {
                        echo("<script>alert('A Cor não pode ser removida!!'); location.href= '../view/cor/listaCor.php';</script>"); 
                }
        }

        function alterar($mysql)
        {
                $id = $_POST['id'];
                $cor = $_POST['cor'];
                
                $obj = new Cor ($id,$cor);
                $dao = new CorDao($mysql);
                $dao->alterar($obj);
                header('Location: ../view/cor/listaCor.php');
        }
?>