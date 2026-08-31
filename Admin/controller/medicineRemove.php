<?php

include "../Model/DatabaseConnection.php";

$id = $_GET["id"];

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "DELETE FROM inventory
WHERE id='$id'";

$result = $connection->query($sql);

if ($result) {
    Header("Location: ../View/medicine.php");
} else {
    echo "Medicine can not be removed.";
}

?>