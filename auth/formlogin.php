<?php
require_once 'session.php';

$error = $_SESSION['login_error'] ?? '';
unset($_SESSION['login_error']);
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-wrapper">
            <h1>Login</h1>
            <form method="POST" action="login.php">
                <input type="email" name="email" placeholder="Enter email" required>
                <input type="password" name="password" placeholder="Enter password" required>

                <?php if (!empty($error)): ?>
                    <div class="error"><?= $error ?></div>
                <?php endif; ?>

                <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="formregister.php">Register</a></p>
        </div>
    </div>
</body>
</html>



