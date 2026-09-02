<?php
$error = "";
$success = "";

if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

if (isset($_GET['success'])) {
    $success = $_GET['success'];
}


?>
<!DOCTYPE html>
<html>
<head>
   
<title>Patient Login</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<div class="auth-page">
 <div class="auth-card login-card">
 <div class="brand">Smart Healthcare</div>
     <h2>Patient Login</h2>
    <p class="subtitle">Welcome back!</p>

        <?php if ($error != "") { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>

        <?php if ($success != "") { ?>
            <div class="success"><?php echo $success; ?></div>
        <?php } ?>

        <form action="../controller/validation.php" method="POST">
           
        <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email">

         <label>Password</label>
            <input type="password" name="password" placeholder="Enter password">

            <button type="submit" name="login">Login</button>

        </form>

       <p class="bottom-text">New patient?

            <a href="registration.php">Create an account</a>

        </p>
    </div>
    
</div>
</body>
</html>