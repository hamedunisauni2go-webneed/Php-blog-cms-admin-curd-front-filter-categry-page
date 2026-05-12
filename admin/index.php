<?php
session_start();
include("../config/db.php");

$error = "";

if(isset($_POST['login'])){

    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = md5($_POST['password']);

    $query = mysqli_query($conn,
    "SELECT * FROM admin 
    WHERE username='$username' 
    AND password='$password'");

    if(mysqli_num_rows($query)>0){

        $_SESSION['admin'] = $username;

        header("Location: dashboard.php");

    }else{

        $error = "Invalid Username or Password";

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Login</title>

<link rel="stylesheet" href="../assets/css/login.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

</head>

<body>

<div class="login-container">

    <div class="login-box">

        <div class="login-header">

            <div class="logo">
                <i class="fa fa-blog"></i>
            </div>

            <h2>Admin Panel</h2>

            <p>Login to manage blogs</p>

        </div>

        <?php if($error != ""){ ?>

            <div class="error-msg">
                <?php echo $error; ?>
            </div>

        <?php } ?>

        <form method="POST">

            <div class="input-group">

                <label>Username</label>

                <div class="input-box">

                    <i class="fa fa-user"></i>

                    <input 
                    type="text" 
                    name="username" 
                    placeholder="Enter username"
                    required>

                </div>

            </div>

            <div class="input-group">

                <label>Password</label>

                <div class="input-box">

                    <i class="fa fa-lock"></i>

                    <input 
                    type="password" 
                    name="password"
                    id="password"
                    placeholder="Enter password"
                    required>

                    <span class="toggle-password" onclick="togglePassword()">
                        <i class="fa fa-eye" id="eyeIcon"></i>
                    </span>

                </div>

            </div>

            <button type="submit" name="login" class="login-btn">

                <i class="fa fa-sign-in-alt"></i>
                Login

            </button>

        </form>

    </div>

</div>

<script>

function togglePassword(){

    let password = document.getElementById("password");
    let eyeIcon = document.getElementById("eyeIcon");

    if(password.type === "password"){

        password.type = "text";

        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");

    }else{

        password.type = "password";

        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");

    }
}

</script>

</body>
</html>