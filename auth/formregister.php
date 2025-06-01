 <?php

require_once "register.php";

$register = new Register();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $register->register();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Register Page</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
     <div class="auth-container">
        <div class="auth-wrapper">
            <h1>Register</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>">
          
                <input type="email" name="email" placeholder="Enter email" required>
                <input type="text" name="username" placeholder="Enter username" required>
                <input type="password" name="password" placeholder="Enter password" required>
                <button type="submit" name="register" value="register">Register</button>
            </form>
            <p>Already have an account? <a href="formlogin.php">Sign in</a></p>
        </div>
    </div>
       
    </div>
</body>

</html>