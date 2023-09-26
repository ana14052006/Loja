<?php
     require "../admin/verificaSessao.php";
     require '../../config/config.php';
     include '../../model/Fornecedor.php';
     include '../../dao/FornecedorDao.php';
     include '../../model/Produto.php';
     include '../../dao/ProdutoDao.php';   
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

  <div class="panel panel-default" style="margin: 10px">
  <div class="panel-heading">
    <div class="clearfix">                            
      <a class="btn btn-outline-success" href="insereProduto.php">Inserir</a>                  
    </div>
  </div>
  </div>
<table class="table">
  <thead>
        
    
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Preco</th> 
      <th scope="col">Foto</th>
      <th scope="col">Fornecedor</th>  
      <th scope="col">Ação</th> 
    </tr>
  </thead>
  <tbody>
    <?php 
        $dao = new ProdutoDao($mysql);
        $lista = $dao->buscarTodos();

        foreach ($lista as $produto) {
          $daoFornecedor= new FornecedorDao($mysql);
          $fornecedor = $daoFornecedor->buscarPorId($produto['tb_fornecedor_idtb_fornecedor']);

          
    ?>
    <tr>
      <td><?=$produto['idtb_produto']?></td>
      <td><?=$produto['nome']?></td>
      <td><?=$produto['preco']?></td>
      <td><?=$produto['foto']?></td>
      <td><?=$fornecedor['nome']?></td>
      <td>
        <a href="editaProduto.php?id=<?=$produto['idtb_produto']?>" class="btn btn-outline-primary">Editar</a>
        <a href="excluiProduto.php?id=<?=$produto['idtb_produto']?>" class="btn btn-outline-danger">Excluir</a>
      </td>
    </tr>

    <?php
        }
    ?> 

  </tbody>
</table>

    <?php
        include '../menu/rodape.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  
</body>
</html>