<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "user";

$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
  die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "select * from login where username='" . $username . "' AND password='" . $password . "'";

  $result = mysqli_query($data, $sql);

  // Check if any rows returned from the query
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    if ($row["usertype"] == "user") {
      $_SESSION["username"] = $username;
      header("location:userhome.php");
    } else if ($row["usertype"] == "admin") {
      $_SESSION["username"] = $username;
      header("location:adminhome.php");
    } else {
      echo "username or password incorrect!";
    }
  } else {
    echo ("username or password incorrect!"); // No rows returned, potentially invalid credentials
  }
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
      background-image: url("bulat.gif");
      background-size: cover;  /* Ensure it covers the entire area */
      background-position: center;  /* Optional: center the image */
      background-repeat: no-repeat;  /* Optional: prevent image tiling */
      margin: 0;  /* Remove default body margin for full background */
      padding: 0;  /* Remove default body padding for full background */
    }
  </style>
</head>
<body>

  <center>

    <h1>Login Form</h1>
    <br><br><br><br>
    <div style="background-color: blue; width: 500px; margin: 0 auto;">  <br><br>

        <form action="#" method="POST">

          <div>
            <label>Username</label>
            <input type="text" name="username" required>
          </div>
          <br><br>
          <div>
            <label>Password</label>
            <input type="password" name="password" required>
          </div>
          <br><br>
          <div>
            <input type="submit" value="Login">
          </div>

        </form>
        <br><br>
    </div>
  </center>
</body>
</html>
