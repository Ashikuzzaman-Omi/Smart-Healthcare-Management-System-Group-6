<?php
require_once 'includes/auth.php';
require_once 'config/db.php';

if (isset($_SESSION['user_id'])) {
    header("Location: medicine_controller.php?action=list");
    exit();
}

$errors   = [];
$username = '';
$email    = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    verify_csrf();

    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm_password'] ?? '';

    if ($username === '') {
        $errors[] = "Username is required.";
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    }
    if ($password === '' || strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }
    if ($password !== $confirm) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $existing = $stmt->get_result()->fetch_assoc();

        if ($existing) {
            $errors[] = "That username or email is already registered.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt2 = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt2->bind_param("sss", $username, $email, $hash);
            $stmt2->execute();

            header("Location: login.php?msg=Registration successful. Please log in.");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Pharmacy</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container" style="max-width:380px;">
    <h2>Create Account</h2>

    <?php if (!empty($errors)): ?>
        <div class="alert" style="background:#f8d7da;border-color:#f5c6cb;color:#721c24;">
            <?php foreach ($errors as $e) echo htmlspecialchars($e) . "<br>"; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="register.php">
        <?php echo csrf_field(); ?>

        <label>Username</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required autofocus>

        <label>Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

        <label>Password</label>
        <input type="password" name="password" required style="margin-bottom:10px;">

        <label>Confirm Password</label>
        <input type="password" name="confirm_password" required style="margin-bottom:10px;">

        <button type="submit" class="btn btn-add" style="width:100%; margin-top:10px;">Register</button>
    </form>

    <p style="text-align:center; margin-top:15px;">
        Already have an account? <a href="login.php">Login here</a>
    </p>
</div>
</body>
</html>