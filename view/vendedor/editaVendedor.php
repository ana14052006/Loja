<?php
 require "../admin/verificaSessao.php"; 
    require '../../config/config.php';
    include '../../dao/VendedorDao.php';
    include '../../model/Vendedor.php';
    include '../../dao/LojaDao.php';
    include '../../model/Loja.php';
    include '../../dao/EnderecoDao.php';
    include '../../model/Endereco.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar vendedor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<?php
   include '../../view/menu/cabecalho.php';

   $id = $_GET['id'];
   $dao = new VendedorDao($mysql);
   $vendedor = $dao->buscarPorId($id);


   $daoEndereco = new EnderecoDao($mysql);
   $endereco = $daoEndereco->buscarPorId($vendedor['tb_endereco_idtb_endereco']);
   
    
?>
<br> 
        <form method="POST" action="../../controller/controllerVendedor.php">     

            <br>
            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Nome</label>
                <input type="text" name="nome" value="<?=$vendedor['nome']?>"  class="form-control" placeholder="Digite o novo nome do vendedor:">
            </div>
            </div>

            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Codigo</label>
                <input type="text" name="codigo" value="<?=$vendedor['codigo']?>"  class="form-control" placeholder="Digite o novo codigo do vendedor:">
            </div> 
            </div>

            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Setor</label>
                <input type="text" name="setor" value="<?=$vendedor['setor']?>"  class="form-control" placeholder="Digite o novo setor do vendedor:">
            </div> 
            </div>
    
            <div class="form-label">
            <div class=" col-md-6 offset-md-3">  
            <br><label for="formGroupExampleInput2" class="form-label">Vendedor da Loja</label> 
                    <select name="loja">
                        <?php
                            $dao = new LojaDao($mysql);
                            $lista = $dao->buscarTodos();
                            foreach($lista as $loja)
                            {
                                if ($vendedor['tb_loja_idtb_loja'] == $loja['idtb_loja']){
                        ?>
                            <option class="form-control-lg" value="<?=$loja['idtb_loja']?>" selected><?=$loja['nome']?></option>
                            <?php
                                }
                                else{
                            ?>
                                <option class="form-control-lg" value="<?=$loja['idtb_loja']?>"><?=$loja['nome']?></option>
                            <?php   
                                }
                            }
                            ?>        
                    </select><br>
            </div>
            </div>


            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Rua:</label>
                <input type="text" name="rua" value="<?=$endereco['rua']?>" class="form-control" placeholder="Digite o rua da loja:">
            </div>          

            </div>
            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Numero:</label>
                <input type="text" name="numero" value="<?=$endereco['numero']?>" class="form-control" placeholder="Digite o numero da loja:">
            </div> 
            </div>

            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Bairro:</label>
                <input type="text" name="bairro" value="<?=$endereco['bairro']?>" class="form-control" placeholder="Digite o bairro da loja:">
            </div> 
            </div>
            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Cep:</label>
                <input type="text" name="cep" value="<?=$endereco['cep']?>" class="form-control" placeholder="Digite o cep da loja:">
            </div> 
            </div>
            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Cidade:</label>
                <input type="text" name="cidade" value="<?=$endereco['cidade']?>" class="form-control" placeholder="Digite a cidade da loja:">
            </div> 
            </div>
            <br>   

            <div class="form-group">
            <div class=" col-md-6 offset-md-3">  
                <br>
                <input type="hidden" name="flag" value ="1">
                <input type="hidden" name="id_endereco" value ="<?=$vendedor['tb_endereco_idtb_endereco']?>">
                <input type="hidden" name="id" value ="<?=$id?>">
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