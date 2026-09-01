<?php

require_once 'config/db.php';

$username = 'admin';
$password = 'admin123';

$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$exists = $stmt->get_result()->fetch_assoc();

if ($exists) {
    echo "Admin user already exists. You can (and should) delete this file now.";
} else {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt2 = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt2->bind_param("ss", $username, $hash);
    $stmt2->execute();
    echo "Admin user created.<br>Username: <b>admin</b><br>Password: <b>admin123</b><br><br>";
    echo "Delete this setup_admin.php file now and change the password after logging in.";
}