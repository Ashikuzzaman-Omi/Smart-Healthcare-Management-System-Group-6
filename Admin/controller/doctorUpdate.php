<?php

include "../Model/DatabaseConnection.php";

$doctor_id = $_POST["doctor_id"];
$doctor_name = $_POST["doctorName"];
$specialization = $_POST["specialization"];
$email = $_POST["email"];
$phone_no = $_POST["doctorPhone"];

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "UPDATE doctors SET
doctor_name='$doctor_name',
specialization='$specialization',
email='$email',
phone_no='$phone_no'
WHERE doctor_id='$doctor_id'";

$result = $connection->query($sql);

if ($result) {
    Header("Location: ../View/doctor.php");
} else {
    echo "Doctor can not be updated.";
}

?>