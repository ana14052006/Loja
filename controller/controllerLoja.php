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
                $daoLoja = new LojaDao($mysql);
                $loja = $daoLoja->buscarPorId($id);
                $id_endereco = $loja['tb_endereco_idtb_endereco'];
 
                if ($daoLoja->remover($id)) {
                        $daoEndereco = new EnderecoDao($mysql);                
                        $daoEndereco->remover($id_endereco);          
                        header('Location: ../view/loja/listaLoja.php');
                }
                else {
                        echo("<script>alert('A loja não pode ser removida!!'); location.href= '../view/loja/listaLoja.php';</script>"); 
                }
        }

        function alterar($mysql)
        {    
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $cnpj = $_POST['cnpj'];
                $logotipo = $_POST['logotipo'];

                $id_admin = $_POST['admin'];
                $id_endereco = $_POST['endereco'];
                
                $admin = new Admin($id_admin,null,null,null,null);
                $endereco = new Endereco($id_endereco,null,null,null,null,null);
                $loja = new Loja($id,$nome,$cnpj,$logotipo,$admin,$endereco);
                $dao = new LojaDao($mysql);
                $dao->alterar($loja);
                header('Location: ../view/loja/listaLoja.php');
        }
?>