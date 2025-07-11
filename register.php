<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Hotel Reservation - Sign Up</title>
   <link rel="stylesheet" href="./css/register.css">
   <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>

<body>

   <?php
   include './header.php';
   ?>


   <div class="main-content">
      <div class="wrapper">
         <form method="post">
            <h2>Registration</h2>

            <div class="row">
               <div class="input-box half">
                  <input type="text" name="first_name" placeholder="First Name" required>
                  <i class='bx bx-user'></i>
               </div>
               <div class="input-box half">
                  <input type="text" name="last_name" placeholder="Last Name" required>
                  <i class='bx bx-user'></i>
               </div>
            </div>

            <div class="input-box">
               <input type="email" name="email" placeholder="Email" required>
               <i class='bx bx-envelope'></i>
            </div>

            <div class="input-box">
               <input type="tel" name="mobile_number" placeholder="Mobile Number" required>
               <i class='bx bx-phone'></i>
            </div>

            <div class="input-box">
               <input type="password" name="password" placeholder="Password" required>
               <i class='bx bx-lock'></i>
            </div>

            <div class="input-box">
               <input type="password" name="confirm_password" placeholder="Confirm Password" required>
               <i class='bx bx-lock'></i>
            </div>

            <button type="submit" class="btn">Sign Up</button>

            <div class="register-link">
               <p>Already have an account? <a href="form.php"><b>Login</b></a></p>
            </div>
         </form>
      </div>
   </div>
   <?php
   include './footer.php';
   ?>


</body>

</html>