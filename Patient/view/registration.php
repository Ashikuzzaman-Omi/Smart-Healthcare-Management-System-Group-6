<?php
$error = "";

if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Registration</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="auth-page">
   
<div class="auth-card">
       
<div class="brand">Smart Healthcare</div>
       
        <h2>Patient Registration</h2>
        <p class="subtitle">Create your patient account</p>


        <?php if ($error != "") { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>

        <form action="../controller/validation.php" method="POST">
            <label>Full Name</label>
            <input type="text" name="name" placeholder="Enter your full name">

            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email">

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password">

            <label>Phone</label>
            <input type="text" name="phone" placeholder="Enter phone number">

            <label>Gender</label>

            <select name="gender">
                <option value="">Select gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>

            </select>

            <label>Age</label>
            <input type="number" name="age" placeholder="Enter age">

            <button type="submit" name="register">Create Account</button>
        </form>

        <p class="bottom-text">Already have an account?
            <a href="login.php">Login</a>
            
        </p>
    </div>
</div>
</body>
</html>