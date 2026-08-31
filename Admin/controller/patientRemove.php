<?php

include "../Model/DatabaseConnection.php";

$patient_serial = $_GET["patient_serial"];

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "DELETE FROM patients
WHERE patient_serial='$patient_serial'";

$result = $connection->query($sql);

if ($result) {
    Header("Location: ../View/patient.php");
} else {
    echo "Patient can not be removed.";
}

?>