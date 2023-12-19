<?php
    require "../admin/verificaSessao.php";    
    require '../../config/config.php';
    include '../../dao/PromocaoDao.php';
    include '../../model/Promocao.php';
    include '../../dao/LojaDao.php';
    include '../../model/Loja.php';
     
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita promoção</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    
<?php
   include '../../view/menu/cabecalho.php';
   
   $id = $_GET['id'];
   $dao = new PromocaoDao($mysql);
   $promo = $dao->buscarPorId($id);

?>
<br>
        <form method="POST" action="../../controller/controllerPromocao.php">     

            <br>
            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Descricao:</label>
                <input type="text" name="descricao"  value="<?=$promo['descricao']?>"  class="form-control" placeholder="Digite a descricao da promocao:">
            </div>
            </div>

            <br>

            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Periodo:</label>
                <input type="text" name="periodo"  value="<?=$promo['periodo']?>"  class="form-control" placeholder="Digite o periodo da promocao">
            </div> 
            </div>

            <div class="form-label">
            <div class=" col-md-6 offset-md-3">
                <label for="formGroupExampleInput" class="form-label">Banner:</label>
                <input type="text" name="banner"  value="<?=$promo['banner']?>"  class="form-control" placeholder="Digite a uri do bannner da promoção">
            </div> 
            </div>
          

            <div class="form-label">
            <div class=" col-md-6 offset-md-3">  
            <br><label for="formGroupExampleInput2" class="form-label">Loja:</label><br>  
                    <select name="loja">
                        <?php
                            $dao = new LojaDao($mysql);
                            $lista = $dao->buscarTodos();
                            foreach($lista as $loja)
                            {
                                if ($promo['tb_loja_idtb_loja'] == $loja['idtb_loja']){
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
            
        
            <div class="form-group">
            <div class=" col-md-6 offset-md-3">  
                <br>
                <input type="hidden" name="flag" value ="1">
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