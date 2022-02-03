<?php

// abre a session
session_start();

// destroi a session
session_destroy();

if (session_status() == 0 || session_status() == 1) {
    // devolve var de erro
    echo 1;
} else {
    // devolve var de sucesso
    echo 0;
}