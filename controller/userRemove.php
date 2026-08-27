<?php

include "../Model/DatabaseConnection.php";

$username = $_GET["username"];

$database = new DatabaseConnection();
$connection = $database->openConnection();

$sql = "DELETE FROM users
WHERE username='$username'";

$result = $connection->query($sql);

if ($result) {
    Header("Location: ../View/user.php");
} else {
    echo "User can not be removed.";
}

?>