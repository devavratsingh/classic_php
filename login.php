<?php
session_start();
// include User file
include_once('User.php');
// Object creation
$userdata=new User();
if(isset($_POST['submit']))
{
// Posted Values
$uemail=$_POST['emailAddress'];
$upass=md5($_POST['password']);
//Function Calling
$sql=$userdata->loginUser($uemail,$upass);
if($sql)
{
    // Message for successfull insertion
    $user_data = mysqli_fetch_array($sql);
    $count_row = $sql->num_rows;
    echo "<pre>";print_r($user_data); echo "</pre>";
    echo "<pre>";print_r($user_data['id']); echo "</pre>";
    if ($count_row == 1) {
        // this login var will use for the session thing
        $_SESSION['login'] = true;
        $_SESSION['uid'] = $user_data['id'];
        header("location: http://localhost/2020/classic-php/index.php");
        session_write_close();
        // echo "<script>window.location.href='index.php'</script>";
    }
    else{
        //echo "<script>window.location.href='login.php'</script>";
    }

}
else
{
// Message for unsuccessfull insertion
echo $sql;
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Devavrat Singh">
    <title>Classic PHP - Register</title>
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="./css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  </head>
  <body class="text-center">
  <form class="form-signin" autocomplete="off" method="POST">
  <div class="text-center mb-4">
    <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
  </div>
  <div class="form-label-group">
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="emailAddress" required>
    <label for="inputEmail">Email address</label>
    <span id="emailavailable"></span>
  </div>

  <div class="form-label-group">
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
    <label for="inputPassword">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary" type="submit" id="submit" name="submit">Login</button>
  <div class="control-group">
    <div class="controls">
    Please Register here <a href="register.php">Register</a>
    </div>
  </div>
</form>
</body>
</html>
