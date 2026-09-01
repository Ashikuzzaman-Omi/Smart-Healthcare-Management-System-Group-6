<?php
// includes/auth.php
// Session start + login guard + CSRF helpers

if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,       // session cookie, dies when browser closes
        'path'     => '/',
        'httponly' => true,    // JS can't read the cookie (helps against XSS stealing it)
        'samesite' => 'Lax'    // helps against CSRF from other sites
    ]);
    session_start();
}

// Call this at the top of any page that requires the user to be logged in
function require_login() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
}

// Returns the current CSRF token, creating one if it doesn't exist yet
function csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Echo this inside every <form> that uses POST
function csrf_field() {
    $token = csrf_token();
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($token) . '">';
}

// Call this at the top of every POST handler (add/edit/delete/login)
function verify_csrf() {
    if (
        !isset($_POST['csrf_token']) ||
        !isset($_SESSION['csrf_token']) ||
        !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
    ) {
        http_response_code(403);
        die("Invalid or expired form submission (CSRF check failed). Please go back and try again.");
    }
}