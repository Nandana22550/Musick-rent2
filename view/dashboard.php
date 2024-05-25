<?php
session_start();
if(empty($_SESSION['username'])) {
    header("Location: Musick/view/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
      rel="stylesheet"
    />
    <link href="C:/laragon/www/Musick/src/style.css" rel="stylesheet" />
  </head>
  <body>
    <nav>
      <ul>
        <li class="logo">
          <img alt="" src="gitar.png" />
        </li>
        <li>
          <a href="dashboard.php"><i class="fa fa-home"></i>   home</a>
        </li>
        <li>
          <a href="table.php"><i class="fa fa-book"></i>   Data Peminjam</a>
        </li>
        <li>
          <a href="login.php"><i class="fa fa-picture-o"></i>   Login</a>
        </li>
      </ul>
    </nav>
    <div class="wrapper">
      <div class="section">
        <div class="box-area">
          <h2 style="color: #ffffff">Welcome to Musick Rent</h2>
          <p style="color: #ffffff">
            Tempat sewa alat musick! tak jamin puas dan sakit
          </p>
        </div>
      </div>
    </div>
  </body>
</html>

'; 
