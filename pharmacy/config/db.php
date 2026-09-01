<?php

require_once __DIR__ . '/../includes/DatabaseConnection.php';

$database = new DatabaseConnection();
$conn     = $database->openConnection();