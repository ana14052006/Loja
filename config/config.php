<?php
    $mysql = new mysqli('localhost', 'root','','loja');
    $mysql->set_charset('UTF8');
    if($mysql == false)
    {
        echo "falha na conexao!!";
    }
?>