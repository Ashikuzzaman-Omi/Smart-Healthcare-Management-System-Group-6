
<?php
session_start();

if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit();
}

include "../model/database.php";

$patient = getPatient($_SESSION['patient_id']);

$success = "";

if (isset($_GET['success'])) {
    $success = $_GET['success'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav class="navbar">
    <div class="logo">Smart Healthcare</div>

    <div class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="profile.php">Profile</a>
        <a href="doctor_search.php">Doctors</a>
        <a href="appointment_history.php">Appointments</a>
        <a href="medical_history.php">Medical History</a>
        <a href="../controller/validation.php?logout=1">Logout</a>
    </div>
</nav>

<div class="container">

    <div class="section-header">
        <p class="small-title">PATIENT INFORMATION</p>
        <h1>My Profile</h1>
    </div>

    <?php if ($success != "") { ?>
        <div class="success">
            <?php echo $success; ?>
        </div>
    <?php } ?>

    <div class="profile-card">

        <div class="profile-avatar">P</div>

        <h2><?php echo $patient['name']; ?></h2>

        <p class="specialty">Patient</p>

        <div class="profile-info">

            <div>
                <strong>Email</strong>
                <span><?php echo $patient['email']; ?></span>
            </div>

            <div>
                <strong>Phone</strong>
                <span><?php echo $patient['phone']; ?></span>
            </div>

            <div>
                <strong>Gender</strong>
                <span><?php echo $patient['gender']; ?></span>
            </div>

            <div>
                <strong>Age</strong>
                <span><?php echo $patient['age']; ?> years</span>
            </div>

        </div>

        <br>

        <a href="edit_profile.php" class="main-btn">
            Edit Profile
        </a>

    </div>

</div>

</body>
</html>

