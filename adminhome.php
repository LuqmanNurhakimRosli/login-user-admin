<?php
session_start();

if(!isset($_SESSION["username"]))
{
    header("location:i.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
      /* Set background image to cover the entire viewport */
      background-image: url("kucing2.gif");
      background-size: cover;
      background-position: center;  /* Optional: center the image */
      background-repeat: no-repeat;  /* Optional: prevent image tiling */
      margin: 0;  /* Remove default body margin for full background */
      padding: 0;  /* Remove default body padding for full background */
      /* Optionally set a background color if the image doesn't cover all areas */
      background-color: #f0f0f0;  /* Light gray background */
    }

    h1, a {
      color: #f0f0f0;  /* Maintains light gray for headings and links */
    }

    /* Style the username specifically to have yellow color */
    .user span {
      color: yellow;
    }
  </style>
</head>
<body>
<h1>HELLO BRO</h1>
  <div class="user">
    <span>
        <?php echo $_SESSION["username"] ?>
    </span>  
</div>
  
  <a href="logout.php">Logout</a>
  
</body>

</html>