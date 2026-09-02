<?php
session_start();

if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit();
}

include "../model/database.php";

$doctor = false;
$error = "";

if (isset($_GET['doctor_id'])) {
    $doctor = getDoctor($_GET['doctor_id']);

    if ($doctor == false) {
        $error = "Invalid doctor selected.";
    }
} else {
    $error = "Please select a doctor first.";
}

if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

?>
<!DOCTYPE html>
<html>
<head>

    <title>Book Appointment</title>
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
    <div class="booking-card">
        <div class="section-header">
            <p class="small-title">APPOINTMENT</p>
            <h1>Book Appointment</h1>
        </div>


        <?php if ($error != "") { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>

        <?php if ($doctor != false) { ?>

            <div class="selected-doctor">
                <div class="doctor-avatar">DR</div>
                <div>
                    <h3><?php echo $doctor['name']; ?></h3>
                    <p><?php echo $doctor['specialty']; ?></p>
                </div>
            </div>

            <form action="../controller/validation.php" method="POST">
                <input type="hidden" name="doctor_id" value="<?php echo $doctor['id']; ?>">

                <label>Appointment Date</label>
                <input type="date" name="appointment_date" min="<?php echo date('Y-m-d'); ?>">

                <label>Appointment Time</label>
                <input type="time" name="appointment_time">

                <label>Reason for Visit</label>
                <textarea name="reason" placeholder="Write your reason for the visit"></textarea>

                <button class="full-btn" type="submit" name="book">Confirm Appointment</button>
            </form>

        <?php } else { ?>
           
        <a class="main-btn" href="doctor_search.php">Back to Doctors</a>
       
        <?php } ?>
   
    </div>
</div>
</body>
</html>