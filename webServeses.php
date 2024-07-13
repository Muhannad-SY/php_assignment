<?php

$host = 'localhost';
$userName = 'root';
$password = '';
$dbName = 'client_management';

$conn = new mysqli($host, $userName, $password, $dbName);

if ($conn->connect_error) {
    die('connection fialed: ' . $conn->connect_error);
}

function fetchCostumers()
{
    $search = '%' . $_GET['search'] . '%';
    global $conn;
    $spam = $conn->prepare('SELECT * FROM customers WHERE customer_name LIKE ? OR email LIKE ? OR phone_number LIKE ? OR address LIKE ? ');
    $spam->bind_param('ssss', $search, $search, $search, $search);
    $spam->execute();
    $x = $spam->get_result();
    if ($x->num_rows > 0) {
        return $x;
    }
    return null;
}


?>
