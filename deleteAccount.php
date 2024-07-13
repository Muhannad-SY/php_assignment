<?php
$host = 'localhost';
$userName = 'root';
$password = '';
$dbName = 'client_management';

$conn = new mysqli($host, $userName, $password, $dbName);

if ($conn->connect_error) {
    die('connection fialed: ' . $conn->connect_error);
}


function deleteCostumer(int $id)
{
    global $conn;
    
    $sql = $conn->prepare("DELETE FROM customers WHERE id = ?");
    $sql->bind_param("i", $id);
    $sql->execute();
   
}
?>