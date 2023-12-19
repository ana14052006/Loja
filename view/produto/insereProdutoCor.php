<?php
    require "../admin/verificaSessao.php";    
    require '../../config/config.php';
    include '../../dao/ProdutoDao.php';
    include '../../model/Produto.php';
    include '../../dao/ProdutoTamanhoDao.php';
    include '../../model/ProdutoTamanho.php';
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
    <title>Insere cores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    
<?php
   include '../../view/menu/cabecalho.php';
   
   $id = $_GET['id'];
   $daoProduto = new ProdutoDao($mysql);
   $produto = $daoProduto->buscarPorId($id);

?>
<br>
        <form method="POST" action="../../controller/controllerProduto.php">     

            <br>
            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label"><h1><?=$produto['nome']?> R$ <?=$produto['preco']?></h1></label><br>
                <label for="formGroupExampleInput" class="form-label"><h3>Disponíveis nos tamanhos</h3></label>
            </div>
            </div>         

            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <table class="table">
                <thead>                    
                    <tr>                    
                    <th scope="col">Tamanho</th>
                    <th scope="col">Quantidade</th> 
                    <th scope="col">Cor</th>                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $daoProdutoTamanho = new ProdutoTamanhoDao($mysql);
                        $listaProdutoTamanho = $daoProdutoTamanho->buscarTodosProdutos($id);
                        $daoTamanho = new TamanhoDao($mysql);
                        foreach($listaProdutoTamanho as $itemProdutoTamanho){
                            $tamanho = $daoTamanho->buscarPorId($itemProdutoTamanho['tb_tamanho_idtb_tamanho']);
                    ?>
                    <tr>
                    <td><?=$tamanho['tamanho']?></td>
                    <td><input type="text" name="qtd<?=$tamanho['idtb_tamanho']?>" size="10" class="form-control" placeholder="Quantidade de produtos nesse tamanho/cor"></td>
                    <td>
                        
                        <select name="cor<?=$tamanho['idtb_tamanho']?>">
                            <?php
                                $daoCor = new CorDao($mysql);
                                $listaCor = $daoCor->buscarTodos();
                                foreach($listaCor as $itemCor)
                                {
                            ?>
                                <option class="form-control-lg" value="<?=$itemCor['idtb_cor']?>"><?=$itemCor['cor']?></option>
                            <?php
                                }
                            ?>        
                        </select>    
                
                    </td>
                    </tr>
                    <?php
                        }
                    ?>

                </tbody>
                </table>
            </div>
            </div>         
            
        
            <div class="form-group">
            <div class=" col-md-6 offset-md-3">  
                <br>
              
                <input type="hidden" name="id" value ="<?=$id?>">
                <input type="submit" name="btn" value="Cancelar" class="btn btn-outline-danger">&nbsp;
                <input type="submit" name="btn" value="Salvar Cores" class="btn btn-outline-success">&nbsp;   
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