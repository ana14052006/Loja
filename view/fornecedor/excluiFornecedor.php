<?php
require "../admin/verificaSessao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir fornecedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <?php
        include '../menu/cabecalho.php';
        $id = $_GET['id'];
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

    <form method="POST" action="../../controller/controllerFornecedor.php">
    <div class="clo-md-50 offset-md-4">

        <div class="card border-success mb-7" style="max-width: 40rem;">
        <div class="card-header bg-white border-info">Confirmar Exclusao</div>
        <div class="card-body bg-white text-dark">
        <h5 class="card-title">Você deseja mesmo revomer este fornecedor?</h5>
    </div>

        <input type="hidden" name="id" value ="<?=$id?>">
        <input type="submit" name="btn" class="btn btn-outline-danger" value="Cancelar">
        <input type="submit" name="btn" class="btn btn-outline-success" value="Excluir">

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
    