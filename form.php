<!DOCTYPE html>
<html lang="en">
<head> 
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="./css/form.css" />
</head>
<body>
    <div class="wrapper">
        <div class="close-btn">&times;</div> 
        <form method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bx-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember Me</label>
                <a href="#">Forgot Password</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Sign Up</a></p>
            </div>

        </form>
    </div>
    <script src="./javascript/script.js"></script>
</body>
</html>
