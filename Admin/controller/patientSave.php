<?php

include "../Model/DatabaseConnection.php";

$patient_name = $_POST["patientName"];
$phone_no = $_POST["phoneNo"];
$record_task_type = $_POST["recordTaskType"];
$email = $_POST["email"];
$address = $_POST["address"];

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "INSERT INTO patients
(patient_name, phone_no, record_task_type, email, address)
VALUES
('$patient_name', '$phone_no', '$record_task_type', '$email', '$address')";

$result = $connection->query($sql);

if ($result) {
    Header("Location: ../View/patient.php");
} else {
    echo "Patient can not be saved.";
}

?>