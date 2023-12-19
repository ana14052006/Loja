<?php
        require '../config/config.php';
        include '../model/Vendedor.php';
        include '../dao/VendedorDao.php';
        include '../model/Loja.php';
        include '../dao/LojaDao.php';
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
         
            header('Location: ../view/vendedor/listaVendedor.php');

        }

      
        function cadastrar($mysql)
        {
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

                $nome = $_POST['nome'];
                $codigo = $_POST['codigo'];
                $setor = $_POST['setor'];
                $id_loja = $_POST['loja'];
                $loja = new Loja ($id_loja,null,null,null,null,null);
                
                $vendedor = new Vendedor (null,$nome,$codigo,$setor,$loja,$end);
                $dao = new VendedorDao ($mysql);
                $dao->cadastrar($vendedor);
                echo("<script>alert('Vendedor cadastrado com sucesso!!'); location.href= '../view/vendedor/listaVendedor.php';</script>");
        }
    
        function excluir($mysql)
        {
                $id = $_POST['id'];
                $daoVendedor = new VendedorDao($mysql);
                $vendedor = $daoVendedor->buscarPorId($id);
                $id_endereco = $vendedor['tb_endereco_idtb_endereco'];
                $daoVendedor->remover($id);
                $daoEndereco = new EnderecoDao($mysql);                
                $daoEndereco->remover($id_endereco);                
                header('Location: ../view/vendedor/listaVendedor.php');
                
        }

        function alterar($mysql)
        {
                $rua = $_POST['rua'];
                $numero = $_POST['numero'];
                $bairro = $_POST['bairro'];
                $cep = $_POST['cep'];
                $cidade = $_POST['cidade'];
                $id_endereco = $_POST['id_endereco'];
                $endereco = new Endereco($id_endereco,$rua,$numero,$bairro,$cep,$cidade);
                $daoEndereco = new EnderecoDao($mysql);
                
                
                $daoEndereco->alterar($endereco);
                               
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $codigo = $_POST['codigo'];
                $setor = $_POST['setor'];
                $id_loja = $_POST['loja'];
                
                $loja = new Loja($id_loja,null,null,null,null,null);
                $vendedor = new Vendedor ($id,$nome,$codigo,$setor,$loja,$endereco);
                $dao = new VendedorDao($mysql);
                $dao->alterar($vendedor);
                header('Location: ../view/vendedor/listaVendedor.php');
                
        }
?>