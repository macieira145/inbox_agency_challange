<?php

require_once '../../database/connection.php';

use database\connection;

// creates database connection
$conn = (new connection())->start_connection();

$query = "";

if (isset($_GET['id'])) {
    $query = "SELECT * FROM Product WHERE id = " . $_GET['id'] . ";";
} else if (isset($_GET['search'])) {
    $query = "SELECT * FROM Product WHERE description like \"" . $_GET['search'] . "%\";";
}

// executa a query
if ($result = $conn->query($query)) {
    // array para guardar os valores
    $product_arr = array();
    $product_arr['data'] = array();

    // recebe todas as rows do resultado
    while ($row = $result->fetch_assoc()) {
        extract($row);

        if (isset($_GET['id'])) {
            $product_arr = [];
            $product_arr = $row;
        } else {
            // coloca o produto no array
            array_push($product_arr['data'], $row);
        }
    }

    // converte para json e devolve
    echo json_encode($product_arr);
}
