<?php
 require "../admin/verificaSessao.php"; 
    require '../../config/config.php';
    include '../../dao/FornecedorDao.php';
    include '../../model/Fornecedor.php';
    include '../../dao/ProdutoDao.php';
    include '../../model/Produto.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Detran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<?php
   include '../../view/menu/cabecalho.php';

   $id = $_GET['id'];
   $dao = new ProdutoDao($mysql);
   $produto = $dao->buscarPorId($id);
    
?>
<br>
<br>
<br>
<br> 
        <form method="POST" action="../../controller/controllerProduto.php">     

            <br>
            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Nome</label>
                <input type="text" name="nome" value="<?=$produto['nome']?>"  class="form-control" placeholder="Digite o novo nome do produto:">
            </div>
            </div>

            <br>
            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Preco</label>
                <input type="text" name="preco" value="<?=$produto['preco']?>"  class="form-control" placeholder="Digite o novo preco do produto:">
            </div>
            </div>

            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Foto:</label>
                <input type="text" name="foto" value="<?=$produto['foto']?>" class="form-control" placeholder="Digite a nova foto do produto:">
            </div> 
            </div>
            <br>

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
    

            <div class="form-group">
            <div class=" col-md-6 offset-md-3">  
                <br>
                <input type="hidden" name="flag" value ="1">
                <input type="submit" name="btn" value="Cancelar" class="btn btn-outline-danger">&nbsp;
                <input type="submit" name="btn" value="Alterar" class="btn btn-outline-success">&nbsp;   
            </div>
            </div>  

        </form>
   
        <?php
            include '../menu/rodape.php';
        ?>     

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

</body>
</html>