<?php
session_start();

if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit();
}

include "../model/database.php";
$patient = getPatient($_SESSION['patient_id']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Dashboard</title>
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
    
<div class="welcome">
    
        <div>
            <p class="small-title">PATIENT DASHBOARD</p>
            <h1>Hello, <?php echo $patient['name']; ?> 👋</h1>
            <p>Manage your healthcare information and appointments from one place.</p>
        </div>
        <div class="health-icon">♥</div>
    </div>

    <h2 class="page-heading">Patient Services</h2>

    <div class="feature-grid">
        <div class="feature-card">
            <div class="icon">👤</div>
            <h3>My Profile</h3>
            <p>View your personal information and account details.</p>
            <a href="profile.php">View Profile</a>
        </div>

        <div class="feature-card">
            <div class="icon">🩺</div>
            <h3>Find Doctor</h3>
            <p>Search doctors and see their specialization and details.</p>
            <a href="doctor_search.php">Search Doctor</a>
        </div>

        <div class="feature-card">
            <div class="icon">📅</div>
            <h3>Appointments</h3>
            <p>Book a doctor appointment and check appointment history.</p>
            <a href="appointment_history.php">View Appointments</a>
        </div>

        <div class="feature-card">
            <div class="icon">📋</div>
            <h3>Medical History</h3>
            <p>See your previous appointment and visit information.</p>
            <a href="medical_history.php">View History</a>

        </div>
    </div>
</div>
</body>
</html>