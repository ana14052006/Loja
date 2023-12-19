<?php
     require "../admin/verificaSessao.php";
     require '../../config/config.php';
     include '../../model/Contato.php';
     include '../../dao/ContatoDao.php';     
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de cores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <?php
        include '../menu/cabecalho.php';
    ?>

<br>
   <table class="table">
    <thead>
          
      
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>        
        <th scope="col">telefone</th>        
        <th scope="col">Mensagem</th>        
        <th scope="col">Ação</th> 
      </tr>
    </thead>
    <tbody>
      <?php 
          $dao = new ContatoDao($mysql);
          $lista = $dao->buscarTodos();

          foreach ($lista as $contato) {           
      ?>
      
      <tr>
        <td><?=$contato['nome']?></td>
        <td><?=$contato['email']?></td>
        <td><?=$contato['telefone']?></td>
        <td><?=$contato['mensagem']?></td>
        
        <td>          
          <a href="excluiContato.php?id=<?=$contato['idtb_contato']?>" class="btn btn-outline-danger">Excluir</a>
        </td>
      </tr>

      <?php
          }
      ?> 

    </tbody>
  </table>

    <br>

    <?php
        include '../menu/rodape.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  
</body>
</html>