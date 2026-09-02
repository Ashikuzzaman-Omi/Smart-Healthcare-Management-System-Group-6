<?php
session_start();

if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit();
}

include "../model/database.php";

$result = getAppointments($_SESSION['patient_id']);
$success = "";

if (isset($_GET['success'])) {
    $success = $_GET['success'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Appointment History</title>
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
        <h1>Appointment History</h1>
        <p>Here you can see your booked appointments.</p>
    </div>

    <?php if ($success != "") { ?>
        <div class="success"><?php echo $success; ?></div>
    <?php } ?>

    <div class="table-card">
        <table>
            <tr>
                <th>Doctor</th>
                <th>Specialty</th>
                <th>Date</th>
                <th>Time</th>
                <th>Reason</th>
            </tr>

            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['doctor_name']; ?></td>
                    <td><?php echo $row['specialty']; ?></td>
                    <td><?php echo $row['appointment_date']; ?></td>
                    <td><?php echo $row['appointment_time']; ?></td>
                    <td><?php echo $row['reason']; ?></td>
                </tr>
            <?php
                }
            } else {
            ?>
                <tr>
                    <td colspan="5" class="center">No appointment found.</td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
</body>
</html>