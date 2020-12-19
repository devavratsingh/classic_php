<?php require('recaptcha/constant.php'); ?>
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
    <script>
    function checkEmail(value) {
    $.ajax({
    type: "POST",
    url: "verifyEmail.php",
    data:'email='+value,
    success: function(data){
    $("#emailavailable").html(data);
    }
    });

    }
</script>
<script src='https://www.google.com/recaptcha/api.js'></script> 
  </head>
  <body class="text-center">
  <form class="form-signin" autocomplete="off" method="POST" action="verify-register.php">
  <div class="text-center mb-4">
    <h1 class="h3 mb-3 font-weight-normal">Registration</h1>
  </div>

  <div class="form-label-group">
    <input type="text" id="inputFirstName" class="form-control" placeholder="First Name" name="firstName" required autofocus>
    <label for="inputFirstName">First Name</label>
  </div>

  <div class="form-label-group">
    <input type="text" id="inputLastName" class="form-control" placeholder="Last Name" name="lastName" required>
    <label for="inputLastName">Last Name</label>
  </div>

  <div class="form-label-group">
    <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="userName" required>
    <label for="inputUsername">Username</label>
  </div>

  <div class="form-label-group">
    <input type="email" id="inputEmail" class="form-control"  onblur="checkEmail(this.value)" placeholder="Email address" name="emailAddress" required>
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
  <div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>	
  <button class="btn btn-lg btn-primary" type="submit" id="submit" name="submit">Register</button>
  <div class="control-group">
    <div class="controls">
        If You are already registered then <a href="login.php">Login</a>
    </div>
  </div>
</form>
</body>
</html>
