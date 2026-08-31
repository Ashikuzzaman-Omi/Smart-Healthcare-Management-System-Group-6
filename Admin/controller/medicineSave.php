<?php

include "../Model/DatabaseConnection.php";

$medicine_name = $_POST["medicineName"];
$quantity = $_POST["quantity"];
$price = $_POST["price"];
$expiry_date = $_POST["expiryDate"];

$purchase_date = date("Y-m-d");
$category = "General";
$status = "Available";

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "INSERT INTO inventory
(product_name, purchase_date, quantity, category, expire_date, status, price)
VALUES
('$medicine_name', '$purchase_date', '$quantity', '$category',
'$expiry_date', '$status', '$price')";

$result = $connection->query($sql);

if ($result) {
    Header("Location: ../View/medicine.php");
} else {
    echo "Medicine can not be saved.";
}

?>