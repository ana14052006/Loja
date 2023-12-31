<?php
        require '../config/config.php';
        include '../model/Loja.php';
        include '../dao/LojaDao.php';
        include '../model/Admin.php';
        include '../dao/AdminDao.php';
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
         
            header('Location: ../view/loja/listaLoja.php');

        }

      
        function cadastrar($mysql)
        {
                $nome = $_POST['nome'];
                $cnpj = $_POST['cnpj'];
                $logotipo = $_POST['caminho_imagem'];
                session_start();
                $id_admin = $_SESSION['id'];
                $adm = new Admin($id_admin,null,null,null,null);
              
                $rua = $_POST['rua'];
                $numero = $_POST['numero'];
                $bairro = $_POST['bairro'];
                $cep = $_POST['cep'];
                $cidade = $_POST['cidade'];

                $endereco = new Endereco(null,$rua,$numero,$bairro,$cep,$cidade);
                $daoEndereco = new EnderecoDao($mysql);
                $daoEndereco->cadastrar($endereco);
                $e = $daoEndereco->maxId();
                $end = new Endereco($e['idtb_endereco'],null,null,null,null,null);              

                $loja = new Loja (null,$nome,$cnpj,$logotipo,$adm,$end);
                $dao = new LojaDao($mysql);
                $dao->cadastrar($loja);
                echo("<script>alert('Loja cadastrada com sucesso!!'); location.href= '../view/loja/listaLoja.php';</script>");
        }
    
        function excluir($mysql)
        {
                $id = $_POST['id'];
                $dao = new LojaDao($mysql);
                $dao->remover($id);

                header('Location: ../view/loja/listaLoja.php');
        }

        function alterar($mysql)
        {    
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $cnpj = $_POST['cnpj'];
                $logotipo = $_POST['caminho_imagem'];
                $id_admin = $_POST['admin'];
                $id_endereco = $_POST['endereco'];
                
                $admin = new Admin($id_admin,null,null,null,null);
                $endereco = new Endereco($id_endereco,null,null,null,null,null);
                $loja = new Loja($id,$nome,$cnpj,$logotipo,$id_admin,$id_endereco);
                $dao = new LojaDao($mysql);
                $dao->alterar($loja);
                header('Location: ../view/loja/listaLoja.php');
        }
?>