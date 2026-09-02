
<?php
session_start();

if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit();
}

include "../model/database.php";

$patient_id = $_SESSION['patient_id'];

$patient = getPatient($patient_id);

$error = "";

if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Profile</title>

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

            <p class="small-title">PATIENT INFORMATION</p>

            <h1>Edit Profile</h1>

            <p>Update your personal information.</p>

        </div>


        <?php if ($error != "") { ?>

            <div class="error">

                <?php echo $error; ?>

            </div>

        <?php } ?>


        <form action="../controller/validation.php" method="POST">

            <label>Full Name</label>
            <input
                type="text"
                name="name"
                value="<?php echo $patient['name']; ?>"
            >
            <label>Email</label>
            <input
                type="email"
                value="<?php echo $patient['email']; ?>"
                disabled
            >

            <label>Phone</label>

            <input
                type="text"
                name="phone"
                value="<?php echo $patient['phone']; ?>"
            >

            <label>Gender</label>

            <select name="gender">

                <option value="">Select Gender</option>

                <option value="Male"
                    <?php
                    if ($patient['gender'] == "Male") {
                        echo "selected";
                    }
                    ?>
                >
                    Male
                </option>

                <option value="Female"
                    <?php
                    if ($patient['gender'] == "Female") {
                        echo "selected";
                    }
                    ?>
                >
                    Female
                </option>

                <option value="Other"
                    <?php
                    if ($patient['gender'] == "Other") {
                        echo "selected";
                    }
                    ?>
                >
                    Other
                </option>

            </select>


            <label>Age</label>

            <input
                type="number"
                name="age"
                value="<?php echo $patient['age']; ?>"
            >


            <button type="submit" name="update_profile">
                Save Changes
            </button>


        </form>


        <br>

        <a class="back-link" href="profile.php">
            Back to Profile
        </a>


    </div>

</div>


</body>

</html>

