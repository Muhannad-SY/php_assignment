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

    $conn->begin_transaction();
    try{
        $sql = $conn->query("DELETE FROM orders WHERE customer_id  = $id");
        if ($sql === false) {
            throw new Exception('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        $sql1 = $conn->query("DELETE FROM customers WHERE id = $id");

        if ($sql === false) {
            throw new Exception('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        $conn->commit();
    }catch (Exception $e){
        $conn->rollback();
        echo "Error deleting customer and related orders: " . $e->getMessage();

    }
   
}
?>