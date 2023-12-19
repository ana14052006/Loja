<?php
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
    <title>Sistema Loja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"rel="stylesheet">
</head>
<body>
    
        <?php
            include '../../view/menu/cabecalho2.php';
        ?> 

<br> 
        <form method="POST" action="../../controller/controllerAdmin.php">     

            <form class="row g-3 needs-validation" novalidate>
            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="validationCustom01" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="validationCustom01" placeholder="Digite seu Email" required>
            <div class="valid-feedback">
                    Looks good!
            </div>
            </div>

            <form class="row g-3 needs-validation" novalidate>
            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="validationCustom02" class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" id="validationCustom02" placeholder="Digite sua Senha" required>
            <div class="valid-feedback">
             Congratulations
            </div>
            </div>
            <div class="form-group">
            <div class=" col-md-6 offset-md-3">  
                <br>
                <input type="hidden" name="flag" value ="1">
                <button type="submit" name="btn" value="Cancelar" class="btn btn-outline-danger">Cancelar<span class="material-icons-outlined" style="font-size: 30px; vertical-align: middle;">highlight_off</span></button>&nbsp;
                <button type="submit" name="btn" value="Logar" class="btn btn-outline-success">Login<span class="material-icons-outlined" style="font-size: 30px; vertical-align: middle;">login</span></button>&nbsp;   
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