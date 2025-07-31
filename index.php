<?php include  './database/Logininsert.php' ?>
<?php include  './database/insert.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/gif" href="./assets/logo.jpg">
   <title>DreamStay - Rest Relax Repeat</title>
</head>

<body>
   <?php
   include 'header.php'
   ?>
   <?php
   include './comopnents/section.php';
   ?>
   <?php
   include 'form.php'
   ?>
   <?php
   include './comopnents/aboutcard.php';
   ?>
   <?php
   include './comopnents/roomscard.php';
   ?>
   <?php
   include "./comopnents/servicescard.php"
   ?>

   <?php
   include "./comopnents/client_review.php" ?>
   <?php
   include 'footer.php'
   ?>

</body>

</html>