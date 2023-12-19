<?php
    require "../admin/verificaSessao.php";    
    require '../../config/config.php';
    include '../../dao/FornecedorDao.php';
    include '../../model/Fornecedor.php';
    include '../../dao/LojaDao.php';
    include '../../model/Loja.php';
    include '../../dao/ProdutoDao.php';
    include '../../model/Produto.php'; 
    include '../../dao/TamanhoDao.php';
    include '../../model/Tamanho.php'; 
    include '../../dao/CorDao.php';
    include '../../model/Cor.php'; 



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserção de produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    
<?php
   include '../../view/menu/cabecalho.php';

?>
<br>
        <form method="POST" action="../../controller/controllerProduto.php">     

            <br>
            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Nome:</label>
                <input type="text" name="nome" class="form-control" placeholder="Digite o nome do produto:">
            </div>
            </div>

            <br>
            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Preco:</label>
                <input type="text" name="preco" class="form-control" placeholder="Digite o preco do produto:">
            </div>
            </div>
            <br>

            <div class="form-label">
            <div class="col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Caminho da imagem:</label>
                <input type="text" name="foto" class="form-control" placeholder="Digite o caminho da imagem:">
            </div>
            </div>


            <div class="form-label">
            <div class=" col-md-6 offset-md-3">  
            <br><label for="formGroupExampleInput2" class="form-label">Loja:</label><br>  
                    <select name="loja">
                        <?php
                            $daoLoja = new LojaDao($mysql);
                            $listaLoja = $daoLoja->buscarTodos();
                            foreach($listaLoja as $itemLoja)
                            {
                        ?>
                            <option class="form-control-lg" value="<?=$itemLoja['idtb_loja']?>"><?=$itemLoja['nome']?></option>
                        <?php
                            }
                        ?>        
                    </select><br>
            </div>
            </div>

        
            <div class="form-label">
            <div class=" col-md-6 offset-md-3">  
            <br><label for="formGroupExampleInput2" class="form-label">Fornecedor:</label><br>  
                    <select name="fornecedor">
                        <?php
                            $dao = new FornecedorDao($mysql);
                            $lista = $dao->buscarTodos();
                            foreach($lista as $fornecedor)
                            {
                        ?>
                            <option class="form-control-lg" value="<?=$fornecedor['idtb_fornecedor']?>"><?=$fornecedor['nome']?></option>
                        <?php
                            }
                        ?>        
                    </select><br>
            </div>
            </div>


            <div class="form-label">
            <div class="col-md-6 offset-md-3">  
            <br><label for="formGroupExampleInput2" class="form-label">Tamanhos disponíveis:</label><br>  
            <?php
                $daoTamanho = new TamanhoDao($mysql);
                $listaTamanho = $daoTamanho->buscarTodos();
                foreach ($listaTamanho as $itemTamanho){
                ?>    
                    <input type="checkbox"  name="tamanho<?= $itemTamanho['idtb_tamanho']?>" value="<?=$itemTamanho['idtb_tamanho']?>">
                    <label><Strong><?=$itemTamanho['tamanho']?></strong></label><br>
                <?php    
                }                

            ?>
            </div>
            </div><br>

        
            <div class="form-group">
            <div class=" col-md-6 offset-md-3">  
                <br>                
                <input type="submit" name="btn" value="Cancelar" class="btn btn-outline-danger">&nbsp;
                <input type="submit" name="btn" value="Cadastrar" class="btn btn-outline-success">&nbsp;   
            </div>
            </div>   

        </form>
        <br>
   
        <?php
            include '../menu/rodape.php';
        ?>     

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

</body>
</html>