<?php
    require 'verificaSessao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <?php
        include '../menu/cabecalho.php';
        
    ?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

    <form method="POST" action="../../controller/controllerAdmin.php">
    <div class="clo-md-10 offset-md-4">

        <div class="card border-success mb-7" style="max-width: 40rem;">
        <div class="card-header bg-white border-info">Confirmar Saida</div>
        <div class="card-body bg-white text-dark">
        <h5 class="card-title">Você tem certeza que quer sair do nosso sistema?</h5>
    </div>

        <input type="hidden" name="flag" value ="2">
        <input type="submit" name="btn" class="btn btn-outline-success" value="Cancelar">
        
        <input type="submit" name="btn" class="btn btn-outline-success" value="Sair">

        </div>
    </div>
</form>
    
    <?php
        include '../menu/rodape.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>
    