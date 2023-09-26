<?php
        require '../config/config.php';
        include '../model/Endereco.php';
        include '../dao/EnderecoDao.php';

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
         
            header('Location: ../view/endereco/listaEndereco.php');

        }

      
        function cadastrar($mysql)
        {
                $rua = $_POST['rua'];
                $numero = $_POST['numero'];
                $bairro = $_POST['bairro'];
                $cep = $_POST['cep'];
                $cidade = $_POST['cidade'];

                $endereco = new Endereco (null,$rua,$numero,$bairro,$cep,$cidade);
                $dao = new EnderecoDao($mysql);
                $dao->cadastrar($endereco);
                echo("<script>alert('Endereco cadastrado com sucesso!!'); location.href= '../view/endereco/listaEndereco.php';</script>");
                        
               

        }
    
        function excluir($mysql)
        {
                $id = $_POST['id'];
                $dao = new EnderecoDao($mysql);
                $dao->remover($id);

                header('Location: ../view/endereco/listaEndereco.php');
        }

        function alterar($mysql)
        {
                $id = $_POST['id'];
                $rua = $_POST['rua'];
                $numero = $_POST['numero'];
                $bairo = $_POST['bairro'];
                $cep = $_POST['cep'];
                $cidade = $_POST['cidade'];
                
                $endereco = new Endereco ($id,$rua,$numero,$bairro,$cep,$cidade);
                $dao = new EnderecoDao($mysql);
                $dao->alterar($endereco);
                header('Location: ../view/endereco/listaEndereco.php');
        }
?>