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
                $nome = $_POST['nome'];
                $codigo = $_POST['codigo'];
                $setor = $_POST['setor'];
                $id_loja = $_POST['loja'];
                $id_endereco = $_POST['endereco'];
                
                $vendedor = new Vendedor (null,$nome,$codigo,$setor,$id_loja,$id_endereco);
                $dao = new VendedorDao ($mysql);
                if($dao->cadastrar($vendedor))
                {       
                        echo("<script>alert('Vendedor cadastrado com sucesso!!'); location.href= '../view/vendedor/listaVendedor.php';</script>");
                        
                }

        }
    
        function excluir($mysql)
        {
                $id = $_POST['id'];
                $dao = new VendedorDao($mysql);
                $dao->remover($id);

                header('Location: ../view/vendedor/listaVendedor.php');
        }

        function alterar($mysql)
        {
               
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $codigo = $_POST['codigo'];
                $setor = $_POST['setor'];
                $id_loja = $_POST['loja'];
                $id_endereco = $_POST['endereco'];

                $loja = new Loja($id_loja,$id_endereco,null,null,null,null);
                $vendedor = new Vendedor ($id,$nome,$codigo,$setor,$id_loja,$id_endereco);
                $dao = new VendedorDao($mysql);
                $dao->alterar($vendedor);
                header('Location: ../view/vendedor/listaVendedor.php');
        }
?>