<?php
// index.php
require_once 'includes/auth.php';

if (isset($_SESSION['user_id'])) {
    header("Location: medicine_controller.php?action=list");
} else {
    header("Location: login.php");
}
exit();