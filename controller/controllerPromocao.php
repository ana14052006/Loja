<?php
        require '../config/config.php';
        include '../model/Promocao.php';
        include '../dao/PromocaoDao.php';
        include '../model/Loja.php';
        include '../dao/LojaDao.php';
        
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
         
            header('Location: ../view/promocao/listaPromocao.php');

        }

      
        function cadastrar($mysql)
        {
                $descricao = $_POST['descricao'];
                $periodo = $_POST['periodo'];
                $banner = $_POST['banner'];
                $id_loja = $_POST['loja'];



                $promocao = new Promocao (null,$descricao,$periodo,$banner,$id_loja);
                $dao = new PromocaoDao($mysql);
                $dao->cadastrar($promocao);
                echo("<script>alert('Promocao cadastrada com sucesso!!'); location.href= '../view/promocao/listaPromocao.php';</script>");
                        
                

        }
    
        function excluir($mysql)
        {
                $id = $_POST['id'];
                $dao = new PromocaoDao($mysql);
                $dao->remover($id);

                header('Location: ../view/promocao/listaPromocao.php');
        }

        function alterar($mysql)
        {
                $id = $_POST['id'];
                $descricao = $_POST['descricao'];
                $periodo = $_POST['periodo'];
                $banner = $_POST['banner'];
                $id_loja = $_POST['loja'];
                
                $loja = new Loja($id_loja,null,null,null,null,null);
                $promocao = new Promocao ($id,$descricao,$periodo,$banner,$loja);
                $dao = new PromocaoDao($mysql);
                $dao->alterar($promocao);
                header('Location: ../view/promocao/listaPromocao.php');
        }
?>