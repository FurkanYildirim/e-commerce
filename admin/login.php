<?php 
require_once('inc/db.php');

if(isset($_POST['login'])){
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $email = htmlentities($email);
  $password = htmlentities($password);

  $check_query = "SELECT * FROM users WHERE email = '$email'";
  $check_run = mysqli_query($conn, $check_query);

  if(mysqli_num_rows($check_run) > 0){
    $row = mysqli_fetch_array($check_run);
    $db_email = $row['email'];
    $db_password = $row['password'];

    $new_password = crypt($password, $db_password);

    if($email == $db_email && $new_password == $db_password){
      session_start();
      $_SESSION['email'] = $db_email;
      header('location: index.php');
    }
    else{
      $error = "Incorrect Email or Password";
    }

  }
  else{
    $error = "Incorrect Email or Password";
  }

}


$salt = '$2y$10$quickbrownfoxjumpsover';
$my_pass = "furkan1234";
$password = crypt($my_pass,$salt);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>Login | FYSOFT Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/animated.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

      <form class="form-signin animated shake" method="POST">
        <h2 class="form-signin-heading">FYSOFT Login</h2>
        <h4>
          <?php
          if (isset($error)){
            echo "<span style='color:red;'>$error</span>";
          }
          ?>
        </h4>
        <br>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
      </form>

    </div> <!-- /container -->

    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
