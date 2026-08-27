<?php

include "../Model/DatabaseConnection.php";

$doctor_id = $_GET["doctor_id"];

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "DELETE FROM doctors
WHERE doctor_id='$doctor_id'";

$result = $connection->query($sql);

if ($result) {
    Header("Location: ../View/doctor.php");
} else {
    echo "Doctor can not be removed.";
}

?>