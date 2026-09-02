<?php
session_start();

if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit();
}

include "../model/database.php";

$doctor = false;
$error = "";

if (isset($_GET['id'])) {
    $doctor = getDoctor($_GET['id']);

    if ($doctor == false) {
        $error = "Invalid doctor selected.";
    }
} else {
    $error = "Invalid doctor selected.";
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Doctor Details</title>
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

<?php if ($doctor != false) { ?>

    <div class="details-card">
        <div class="doctor-avatar big">DR</div>
        <h1><?php echo $doctor['name']; ?></h1>
        <p class="specialty"><?php echo $doctor['specialty']; ?></p>

        <div class="detail-row">
            <strong>Qualification</strong>
            <span><?php echo $doctor['qualification']; ?></span>
        </div>


        <div class="detail-row">
            <strong>Phone</strong>
            <span><?php echo $doctor['phone']; ?></span>
        </div>

        
        <div class="detail-row">
            <strong>Chamber</strong>
            <span><?php echo $doctor['chamber']; ?></span>
        </div>

        <a class="main-btn" href="appointment_booking.php?doctor_id=<?php echo $doctor['id']; ?>">Book Appointment</a>
        <a class="back-link" href="doctor_search.php">Back to Doctors</a>
    </div>

<?php } else { ?>
    <div class="error"><?php echo $error; ?></div>
<?php } ?>

</div>
</body>
</html>