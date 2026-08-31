<?php

include "../Model/DatabaseConnection.php";

$patient_name = $_POST["patientName"];
$phone_no = $_POST["phoneNo"];
$amount = $_POST["amount"];
$patient_serial = $_POST["patientSerial"];
$payment_date = $_POST["paymentDate"];
$status = $_POST["status"];

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "INSERT INTO payments
(patient_name, phone_no, amount, patient_serial, payment_date, status)
VALUES
('$patient_name', '$phone_no', '$amount', '$patient_serial',
'$payment_date', '$status')";

$result = $connection->query($sql);

if ($result) {
    Header("Location: ../View/payment.php");
} else {
    echo "Payment can not be saved.";
}

?>