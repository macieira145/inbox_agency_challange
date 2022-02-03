<?php

require_once '../../database/connection.php';

use database\connection;

// creates database connection
$conn = (new connection())->start_connection();

// executa a query
if ($result = $conn->query("SELECT * FROM Product LIMIT " . $_GET['row'] . ", 3;")) {
    // array para guardar os valores
    $product_arr = array();
    $product_arr['data'] = array();

    // recebe todas as rows do resultado
    while ($row = $result->fetch_assoc()) {
        extract($row);

        // coloca o produto no array
        array_push($product_arr['data'], $row);
    }

    // converte para json e devolve
    echo json_encode($product_arr);
}
