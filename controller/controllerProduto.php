<?php
        require '../config/config.php';
        include '../model/Produto.php';
        include '../dao/ProdutoDao.php';
        include '../model/Fornecedor.php';
        include '../dao/FornecedorDao.php';
        include '../model/Loja.php';
        include '../dao/LojaDao.php';        
        include '../model/Tamanho.php';
        include '../dao/TamanhoDao.php';
        include '../model/ProdutoTamanho.php';
        include '../dao/ProdutoTamanhoDao.php';
        include '../model/Cor.php';
        include '../dao/CorDao.php';        
        include '../dao/ProdutoTamanhoCorDao.php';
        
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

                case 'Salvar Cores': salvarCores($mysql);
                break;
        }

        function cancelar()
        {
         
            header('Location: ../view/produto/listaProduto.php');

        }

        function salvarCores($mysql){
                $idProduto = $_POST['id'];

                $daoProdutoTamanho = new ProdutoTamanhoDao($mysql);
                $listaProdutoTamanho = $daoProdutoTamanho->buscarTodosProdutos($idProduto);
                $daoProdutoTamanhoCor = new ProdutoTamanhoCorDao($mysql);
                foreach($listaProdutoTamanho as $itemProdutoTamanho){                        
                        $qtd = "qtd".$itemProdutoTamanho['tb_tamanho_idtb_tamanho'];
                        $qtd = $_POST[$qtd];
                        $idTamanho = $itemProdutoTamanho['tb_tamanho_idtb_tamanho'];
                        $idCor = "cor".$itemProdutoTamanho['tb_tamanho_idtb_tamanho'];
                        $idCor = $_POST[$idCor];
                        $daoProdutoTamanhoCor->insereProdutoTamanhoCor($idProduto, $idTamanho,$idCor,$qtd);                             
                      
                } 
                echo("<script>alert('Cores cadastradas com sucesso!!'); location.href= '../view/produto/listaProduto.php';</script>");
        }

        function cadastrar($mysql)
        {
                $nome = $_POST['nome'];
                $preco = $_POST['preco'];
                $foto = $_POST['foto'];
                $id_fornecedor = $_POST['fornecedor'];
                $id_loja = $_POST['loja'];

                $fornecedor = new Fornecedor($id_fornecedor,null,null);
                $loja = new Loja($id_loja,null,null,null,null,null);
               
                $produto = new Produto (null,$nome,$preco,$foto,$fornecedor,$loja);
                $daoProduto = new ProdutoDao ($mysql);
                $daoProduto->cadastrar($produto);
                $idProduto = $daoProduto->maxId();

                $daoTamanho = new TamanhoDao($mysql);
                $listaTamanho = $daoTamanho->buscarTodos();
                foreach ($listaTamanho as $itemTamanho){
                        $tam = "tamanho".$itemTamanho['idtb_tamanho'];
                        $idTamanho = $itemTamanho['idtb_tamanho'];
                        if (isset($_POST[$tam])){
                                $daoTamanho->insereProdutoTamanho($idProduto['idtb_produto'], $idTamanho);                             
                        }
                } 
                echo("<script>alert('Produto cadastrado com sucesso!!'); location.href= '../view/produto/listaProduto.php';</script>");
         

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
                $id_fornecedor = $_POST['fornecedor'];

                $fornecedor = new Fornecedor($id_fornecedor,null,null);
                //$produto = new Produto ($id,$nome,$preco,$foto,$id_fornecedor);
                //$dao = new ProdutoDao($mysql);
                //$dao->alterar($produto);
                header('Location: ../view/produto/listaProduto.php');
        }
?>