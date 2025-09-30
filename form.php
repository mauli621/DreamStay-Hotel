<?php
$conn = new mysqli("localhost", "root", "", "hotel");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DreamStay - Rest Relax Repeat</title>
  <link rel="icon" type="image/gif" href="./assets/logo.jpg">
  <link rel="stylesheet" href="./css/form.css" />
</head>

<body>


  <div class="auth-popup">
    <div class="popup" id="loginPopup" action="index.php">
      <div class="close-btn">&times;</div>
      <form method="post" action="index.php">
  <input type="hidden" name="login" value="1">
  <h1>Login</h1>
  <div class="input-box">
    <input type="text" name="Email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
  </div>
  <div class="input-box">
    <input type="password" name="password" placeholder="Password" required />
  </div>
  <div class="remember-forgot">
    <label><input type="checkbox" />Remember Me</label>
    <a href="#">Forgot Password?</a>
  </div>
  <button type="submit" class="btn" name="login">Login</button>
  <div class="register-link">
    <p>Don't have an account? <a href="#" id="showSignup">Sign Up</a></p>
  </div>
</form>

    </div>

    <!-- Sign Up Form -->
    <div class="popup" id="signupPopup">
      <div class="close-btn">&times;</div>
      <form method="post" action="index.php">
        <input type="hidden" name="signup" value="1">
        <h1>Sign Up</h1>
        <div class="input-box">
          <input type="text" name="firstname" placeholder="First Name" required />
        </div>
        <div class="input-box">
          <input type="text" name="lastname" placeholder="Last Name" required />
        </div>
        <div class="input-box">
          <input type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
        </div>
        <div class="input-box">
          <input type="text" name="mobno" placeholder="Mobile No" pattern="[0-9]{10}" required />
        </div>
        <div class="input-box">
          <input type="password" name="password" pattern="^.{6,}$" placeholder="Password" required />
        </div>
        <div class="input-box">
          <input type="password" name="confirm_password" placeholder="Confirm Password" required />
        </div>
        <button type="submit" class="btn">Register</button>
        <div class="register-link">
          <p>Already have an account? <a href="#" id="showLogin">Login</a></p>
        </div>
      </form>
    </div>
  </div>

  <script src="./javascript/script.js"></script>
</body>

</html>