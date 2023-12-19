<?php
        require '../config/config.php';
        include '../model/Produto.php';
        include '../dao/ProdutoDao.php';
        include '../model/Fornecedor.php';
        include '../dao/FornecedorDao.php';
        
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
         
            header('Location: ../view/produto/listaProduto.php');

        }

      
        function cadastrar($mysql)
        {
                $nome = $_POST['nome'];
                $preco = $_POST['preco'];
                $foto = $_POST['caminho_imagem'];
                $qtd = $_POST['quantidade'];
                $id_fornecedor = $_POST['fornecedor'];
                $id_loja = $_POST['loja'];
                
                $produto = new Produto (null,$nome,$preco,$foto,$qtd,$id_fornecedor,$id_loja);
                $dao = new ProdutoDao ($mysql);
                if($dao->cadastrar($produto))
                {       
                        echo("<script>alert('Produto cadastrado com sucesso!!'); location.href= '../view/produto/listaProduto.php';</script>");
                        
                }

        }
    
        function excluir($mysql)
        {
                $id = $_POST['id'];
                $dao = new ProdutoDao($mysql);
                $dao->remover($id);

                header('Location: ../view/produto/listaProduto.php');
        }

        function alterar($mysql)
        {
               
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $preco = $_POST['preco'];
                $foto = $_POST['caminho_imagem'];
                $qtd = $_POST['quantidade'];
                $id_fornecedor = $_POST['fornecedor'];
                $id_loja = $_POST['loja'];

                $fornecedor = new Fornecedor($id_fornecedor,null,null);
                $loja = new Loja($id_loja,null,null,null,null,null);
                $produto = new Produto ($id,$nome,$preco,$foto,$qtd,$id_fornecedor,$id_loja);
                $dao = new ProdutoDao($mysql);
                $dao->alterar($produto);
                header('Location: ../view/produto/listaProduto.php');
        }
?>