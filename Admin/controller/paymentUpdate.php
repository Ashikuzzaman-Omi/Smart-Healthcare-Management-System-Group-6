<?php

include "../Model/DatabaseConnection.php";

$payment_id = $_POST["payment_id"];
$patient_name = $_POST["patientName"];
$phone_no = $_POST["phoneNo"];
$amount = $_POST["amount"];
$patient_serial = $_POST["patientSerial"];
$payment_date = $_POST["paymentDate"];
$status = $_POST["status"];

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "UPDATE payments SET
patient_name='$patient_name',
phone_no='$phone_no',
amount='$amount',
patient_serial='$patient_serial',
payment_date='$payment_date',
status='$status'
WHERE payment_id='$payment_id'";

$result = $connection->query($sql);

if ($result) {
    Header("Location: ../View/payment.php");
} else {
    echo "Payment can not be updated.";
}

?>