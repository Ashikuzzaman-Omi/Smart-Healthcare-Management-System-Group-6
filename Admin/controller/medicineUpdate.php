<?php

include "../Model/DatabaseConnection.php";

$id = $_POST["id"];
$medicine_name = $_POST["medicineName"];
$quantity = $_POST["quantity"];
$price = $_POST["price"];
$expiry_date = $_POST["expiryDate"];

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "UPDATE inventory SET
product_name='$medicine_name',
quantity='$quantity',
price='$price',
expire_date='$expiry_date'
WHERE id='$id'";

$result = $connection->query($sql);

if ($result) {
    Header("Location: ../View/medicine.php");
} else {
    echo "Medicine can not be updated.";
}

?>