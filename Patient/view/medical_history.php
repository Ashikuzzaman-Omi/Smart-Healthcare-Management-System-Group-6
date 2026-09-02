<?php
session_start();

if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit();
}

include "../model/database.php";

$result = getMedicalHistory($_SESSION['patient_id']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Medical History</title>
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
        <p class="small-title">PATIENT RECORD</p>
        <h1>Medical History</h1>
        <p>Your previous doctor visits and appointment records.</p>

    </div>

    <div class="history-list">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="history-card">
                <div class="history-date"><?php echo $row['appointment_date']; ?></div>
                <div class="history-info">
                    <h3><?php echo $row['doctor_name']; ?></h3>
                    <p class="specialty"><?php echo $row['specialty']; ?></p>
                    <p><strong>Reason:</strong> <?php echo $row['reason']; ?></p>
                    <p><strong>Time:</strong> <?php echo $row['appointment_time']; ?></p>
                </div>
        
            </div>

        <?php
            }
        } else {
        ?>
            <div class="empty-box">No medical history found.</div>
        <?php } ?>
    </div>
    
</div>
</body>
</html>