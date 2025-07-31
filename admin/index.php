<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DreamStay - Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./css/index.css">
</head>

<body>
  <div class="wrapper">
    <form action="admin.php" method="post">
      <h1>Login</h1>
      <div class="input-box">
        <input type="text" name="username" placeholder="Username" required />
        <i class='bx bx-user'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required />
        <i class='bx bx-lock'></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox" /> Remember Me</label>
      </div>
      <button type="submit" class="btn">Login</button>
    </form>
  </div>
</body>

</html>

