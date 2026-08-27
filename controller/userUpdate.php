<?php

include "../Model/DatabaseConnection.php";

$username = $_POST["username"];
$full_name = $_POST["fullName"];
$nid = $_POST["nid"];
$email = $_POST["email"];
$address = $_POST["address"];
$password = $_POST["password"];
$phone_no = $_POST["phoneNo"];
$role = $_POST["role"];

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "UPDATE users SET
full_name='$full_name',
nid='$nid',
email='$email',
address='$address',
password='$password',
phone_no='$phone_no',
role='$role'
WHERE username='$username'";

$result = $connection->query($sql);

if ($result) {
    Header("Location: ../View/user.php");
} else {
    echo "User can not be updated.";
}

?>