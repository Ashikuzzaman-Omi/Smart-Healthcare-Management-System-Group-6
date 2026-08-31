<?php

include "../Model/DatabaseConnection.php";

$payment_id = $_GET["payment_id"];

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "DELETE FROM payments
WHERE payment_id='$payment_id'";

$result = $connection->query($sql);

if ($result) {
    Header("Location: ../View/payment.php");
} else {
    echo "Payment can not be removed.";
}

?>