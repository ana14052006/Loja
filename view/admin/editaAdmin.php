<?php
    require "../admin/verificaSessao.php";    
    require '../../config/config.php';
    include '../../dao/AdminDao.php';
    include '../../model/Admin.php';
     
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
   $dao = new AdminDao($mysql);
   $admin = $dao->buscarPorId($id);
    
?>
<br>
<br>
<br>
<br> 
        <form method="POST" action="../../controller/controllerAdmin.php">     

            <br>
            
            
            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Email:</label>
                <input type="email" name="email" value="<?=$admin['email']?>" class="form-control" placeholder="Digite o novo email do admin:"> 
            </div> 
            </div>
            <br>


            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Senha:</label>
                <input type="text" name="senha" value="<?=$admin['senha']?>" class="form-control" placeholder="Digite a nova senha do admin:"> 
            </div> 
            </div>
            <br>

        
    
            <div class="form-group">
            <div class=" col-md-6 offset-md-3">  
                <br>
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