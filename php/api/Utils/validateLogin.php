<?php

// inicia a session
session_start();

// verifica se foi feito o login através da session
if(!isset($_SESSION['login'])) {
    header('location: ../index.php');
}

?>