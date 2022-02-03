<?php

// inicia a sessão
if (!$_SESSION) {
    session_start();
}

// recebe o user da session
$user = $_SESSION['user'];

// para usar este método é necessário configurar o "[email function]" no ficheiro de configuração php.ini
// UNIX - https://hostpresto.com/community/tutorials/how-to-send-email-from-the-command-line-with-msmtp-and-mutt/
// WINDOWS - 
// envia o email de confirmação ao user logado na app
// verifica se o email foi enviado com sucesso

$headers = 'From: macieira.development@sapo.pt' . "\r\n" .
   'Reply-To: macieira.development@sapo.pt' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();

if(mail($user['email'], "Compra", "Email de confirmação de compra", $headers)) {
    echo json_encode(["result" => true]);
} else {
    echo json_encode(["result" => false]);
}