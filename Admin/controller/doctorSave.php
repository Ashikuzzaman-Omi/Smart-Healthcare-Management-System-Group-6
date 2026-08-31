<?php

include "../Model/DatabaseConnection.php";

$doctor_name = $_POST["doctorName"];
$specialization = $_POST["specialization"];
$email = $_POST["email"];
$phone_no = $_POST["doctorPhone"];

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "INSERT INTO doctors
(doctor_name, specialization, email, phone_no)
VALUES
('$doctor_name', '$specialization', '$email', '$phone_no')";

$result = $connection->query($sql);

if ($result) {
    Header("Location: ../View/doctor.php");
} else {
    echo "Doctor can not be saved.";
}

?>