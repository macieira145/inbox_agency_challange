<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../../database/connection.php';

use database\connection;

// cria a ligação com a base de dados 
$conn = (new connection())->start_connection();

session_start();

// recebe os dados do post 
// valida o SQL Injection
$name = mysqli_real_escape_string($conn, $_POST['name']);
$surname = mysqli_real_escape_string($conn, $_POST['surname']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

// verifica se os campos estão aptos para serem inseridos na base de dados
if (
    !empty(trim($name)) and !empty(trim($surname))
    and !empty(trim($username))
    and !empty(trim($email))
) {

    $pQuery = "";
    if(!empty(trim($password))) {
        $pQuery = ", password = '$password'";
    } 

    // atualiza os dados do user
    $userUpdate = $conn->query("UPDATE User SET name = '$name',
                                    email = '$email',
                                    surname = '$surname',
                                    username = '$username'". $pQuery .
                                    " WHERE id = " . $_SESSION['user']['id'] . ";");

    // verifica se todas as queries foram executadas com sucesso
    // se sim faz update
    // caso contrário manda o resultado para trás
    if ($userUpdate) {
        // atualiza os dados da session
        $_SESSION['user']['username'] = $username;
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['surname'] = $surname;
        $_SESSION['user']['password'] = $password;
        $_SESSION['user']['email'] = $email;

        echo json_encode(array("result" => true));
    } else {
        echo json_encode(array("result" => false, "1" => "1"));
    }
} else {
    echo json_encode(array("result" => false, "2" => "2"));
}