<?php

require_once '../../database/connection.php';

use database\connection;

// verifica se foi executado o post
if ($_POST) {
    // apresenta qualquer erro  
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $conn = (new connection())->start_connection();

    $identifier = mysqli_real_escape_string($conn, $_POST['identifier']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // verifica se o utilizador 
    if (!empty($identifier) || !is_null($identifier)) {

        // query para a receção do user da base de dados
        $query = "SELECT id, username, email, name, surname, password FROM User WHERE ( username = '$identifier' OR email = '$identifier');";

        // verifica se a query foi bem executada
        if ($result = mysqli_query($conn, $query)) {
            // recebe os dados da bd
            $user = $result->fetch_assoc();

            // verifica se algum user foi matched
            if ($user !== null) {
                if ($user['password'] === $password) {
                    //if (count($profiles) == 1) {
                    // inicia a sessão
                    if (!$_SESSION) {
                        session_start();
                    }

                    // devolve os dados necessários à sessão
                    $_SESSION['login'] = 1;
                    unset($user['password']);
                    $_SESSION['user'] = $user;

                    header('location: /challange/views/products.php');
                } else {
                    // encerramento da ligação com a base de dados
                    mysqli_close($conn);

                    // retorna para a página login com um aviso de erro
                    header('location: /challange/index.php?error=password');
                }
            } else {
                // encerramento da ligação com a base de dados
                mysqli_close($conn);

                // retorna para a página log in com um aviso de erro
                header('location: /challange/index.php?error=nouser');
            }
        } else {
            echo mysqli_error($conn);
        }
    }
}
