<?php
session_start();

if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit();
}

include "../model/database.php";

$search = "";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$result = searchDoctors($search);
$error = "";

if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Doctor Search</title>
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
        <p class="small-title">HEALTHCARE SERVICES</p>
        <h1>Find a Doctor</h1>
        <p>Search doctors by name or specialty.</p>
    </div>

    <?php if ($error != "") { ?>
        <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <form class="search-form" method="GET" action="doctor_search.php">
        <input type="text" name="search" value="<?php echo $search; ?>" placeholder="Search by doctor name or specialty">
        <button type="submit">Search</button>
        
    </form>

    <div class="doctor-grid">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($doctor = mysqli_fetch_assoc($result)) {
        ?>

            <div class="doctor-card">
              
            <div class="doctor-avatar">DR</div>
                
    <h2><?php echo $doctor['name']; ?></h2>
                <p class="specialty"><?php echo $doctor['specialty']; ?></p>
                <p><?php echo $doctor['qualification']; ?></p>
                <p class="muted">📞 <?php echo $doctor['phone']; ?></p>
                <a class="btn-small" href="doctor_details.php?id=<?php echo $doctor['id']; ?>">View Details</a>
            </div>
        <?php
            }
        } else {
        ?>
            <div class="empty-box">No doctor found.</div>

        <?php } ?>

    </div>
</div>
</body>
</html>