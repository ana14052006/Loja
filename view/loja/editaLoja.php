<?php
    require "../admin/verificaSessao.php";    
    require '../../config/config.php';
    include '../../dao/LojaDao.php';
    include '../../model/Loja.php';
    include '../../model/Admin.php';
    include '../../dao/AdminDao.php';
    include '../../model/Endereco.php';
    include '../../dao/EnderecoDao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Loja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    
<?php
   include '../../view/menu/cabecalho.php';
   $id = $_GET['id'];
   $dao = new LojaDao($mysql);
   $loja = $dao->buscarPorId($id);
?>
<br> 
        <form method="POST" action="../../controller/controllerLoja.php">     

            <br>
            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Nome:</label>
                <input type="text" name="nome" value="<?=$loja['nome']?>" class="form-control" placeholder="Digite o novo nome da loja:">
            </div>
            </div>

            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">CNPJ:</label>
                <input type="text" name="cnpj" value="<?=$loja['cnpj']?>" class="form-control" placeholder="Digite o novo cnpj da loja:">
            </div> 
            </div>
            <br>

            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Logotipo:</label>
                <input type="text" name="logotipo" value="<?=$loja['logotipo']?>" class="form-control" placeholder="Digite o novo logitipo da loja:">
            </div> 
            </div>
            <br>
    
            <div class="form-group">
            <div class=" col-md-6 offset-md-3">  
                <br>          
                <input type="hidden" name="endereco" value ="<?=$loja['tb_endereco_idtb_endereco']?>">
                <input type="hidden" name="admin" value ="<?=$loja['tb_admin_idtb_admin']?>">
                <input type="hidden" name="id" value ="<?=$id?>">
                <input type="submit" name="btn" value="Cancelar" class="btn btn-outline-danger">&nbsp;
                <input type="submit" name="btn" value="Alterar" class="btn btn-outline-success">&nbsp;   
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