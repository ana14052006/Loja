<?php
    session_start();
    if(!isset($_SESSION["email"]))
    {
        header("Location: ../admin/logarAdmin.php");
        exit;
    }
?>