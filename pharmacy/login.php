<?php
// login.php
require_once 'includes/auth.php';
require_once 'config/db.php';

// already logged in? go straight to the app
if (isset($_SESSION['user_id'])) {
    header("Location: medicine_controller.php?action=list");
    exit();
}

$error = '';
$successMsg = $_GET['msg'] ?? '';

// remember the username in a cookie so it's prefilled next time
$rememberedUsername = $_COOKIE['username'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    verify_csrf();

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

   $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ? OR email = ?");
   $stmt->bind_param("ss", $username, $username);
   $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // regenerate session id on login to prevent session fixation
        session_regenerate_id(true);
        $_SESSION['user_id']  = $user['id'];
        $_SESSION['username'] = $user['username'];

        // remember username in a cookie for 7 days, httponly so JS can't steal it
        setcookie("username", $user['username'], time() + 7 * 24 * 3600, "/", "", false, true);

        header("Location: medicine_controller.php?action=list");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Pharmacy</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container" style="max-width:380px;">
    <h2>Pharmacy Login</h2>

       <?php if ($successMsg): ?>
        <div class="alert">
            <?php echo htmlspecialchars($successMsg); ?>
        </div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="alert" style="background:#f8d7da;border-color:#f5c6cb;color:#721c24;">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; 
    ?>

    <form method="POST" action="login.php">
        <?php echo csrf_field(); ?>

                <label>Username or Email</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($rememberedUsername); ?>" placeholder="Enter username or email" required autofocus>
        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" class="btn btn-add" style="width:100%; margin-top:20px;">Login</button>
    </form>
        <p style="text-align:center; margin-top:15px;">
        Don't have an account? <a href="register.php">Register here</a>
    </p>
</div>
</body>
</html>