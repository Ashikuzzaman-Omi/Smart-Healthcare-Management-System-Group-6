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

$sql = "INSERT INTO users
(username, full_name, nid, email, address, password, phone_no, role)
VALUES
('$username', '$full_name', '$nid', '$email', '$address',
'$password', '$phone_no', '$role')";

$result = $connection->query($sql);

if ($result) {
    Header("Location: ../View/user.php");
} else {
    echo "User can not be saved.";
}

?>