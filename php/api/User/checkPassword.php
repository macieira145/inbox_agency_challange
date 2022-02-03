<?php

session_start();

echo json_encode(array("password" => $_SESSION['Password']));