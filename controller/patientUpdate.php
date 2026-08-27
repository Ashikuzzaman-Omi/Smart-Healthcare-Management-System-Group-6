<?php

include "../Model/DatabaseConnection.php";

$patient_serial = $_POST["patient_serial"];
$patient_name = $_POST["patientName"];
$phone_no = $_POST["phoneNo"];
$record_task_type = $_POST["recordTaskType"];
$email = $_POST["email"];
$address = $_POST["address"];

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "UPDATE patients SET
patient_name='$patient_name',
phone_no='$phone_no',
record_task_type='$record_task_type',
email='$email',
address='$address'
WHERE patient_serial='$patient_serial'";

$result = $connection->query($sql);

if ($result) {
    Header("Location: ../View/patient.php");
} else {
    echo "Patient can not be updated.";
}

?>