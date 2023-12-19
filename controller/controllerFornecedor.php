<?php
        require '../config/config.php';
        include '../model/Fornecedor.php';
        include '../dao/FornecedorDao.php';
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
         
            header('Location: ../view/fornecedor/listaFornecedor.php');

        }

      
        function cadastrar($mysql)
        {
                $nome = $_POST['nome'];
                $id_loja = $_POST['loja'];
                $loja = new Loja($id_loja,null,null,null,null,null);
                $fornecedor = new Fornecedor (null,$nome,$loja);
                $dao = new FornecedorDao($mysql);
                $dao->cadastrar($fornecedor);
                echo("<script>alert('Fornecedor cadastrado com sucesso!!'); location.href= '../view/fornecedor/listaFornecedor.php';</script>");
        }
    
        function excluir($mysql)
        {
                $id = $_POST['id'];
                $dao = new FornecedorDao($mysql);
                $dao->remover($id);

                header('Location: ../view/fornecedor/listaFornecedor.php');
        }

        function alterar($mysql)
        {               
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $id_loja = $_POST['loja'];

                $loja = new Loja($id_loja,null,null,null,null,null);
                $fornecedor = new Fornecedor ($id,$nome,$loja);
                $dao = new FornecedorDao($mysql);
                $dao->alterar($fornecedor);
                header('Location: ../view/fornecedor/listaFornecedor.php');
        }
?>