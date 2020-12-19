<?php session_start();
include_once 'User.php';
$user = new User();
if(isset($_SESSION['uid'])) $uid = $_SESSION['uid'];
if (!$user->get_session()){
 header("location:login.php");
}
$proFile = $user->getProfile($uid);
if($proFile){
    $userData = mysqli_fetch_array($proFile);
}
if(isset($_POST["submit"])){
  $savedPass = $userData["user_pass"];
  $oldPassW = md5($_POST['oldPass']);
  $newPassW = md5($_POST['newPass']);
  if($savedPass == $oldPassW){
    $updataStatus = $user->updateProfilePassword($uid, $newPassW);
    if($updataStatus){
      header("location: profile.php?succmessage=Your New Password is saved Successfully.");
    }
  } else {
    header("location: profile.php?errmessage=You have Entered Wrong Old Password Details.");
    //echo "<script>alert('Your Old Password is Incorrect.'); return false;</script>";
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Devavrat Singh">
    <title>Classic PHP</title>

    <!-- Bootstrap core CSS -->
<link href="./css/bootstrap.min.css" rel="stylesheet">
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
    <link href="./css/homestyle.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function checkPassword(value) {
          //alert(value);
          $.ajax({
            type: "POST",
            url: "verifyPassword.php",
            data:'passW='+value+'&uid='+<?php echo $uid; ?>,
            success: function(data){
              $("#messages").html(data);
            }
          });
        }
    </script>
    <script>
      compareWithOld = (value) => {
        var oldPSW = document.getElementById("oldPSW");
        if(oldPSW.value === value){
          document.getElementById("submit").disabled = true;
          document.getElementById("feedMe").style.display = "block";
        } else {
          document.getElementById("succMe").style.display = "block";
          document.getElementById("submit").disabled = false;
          document.getElementById("feedMe").style.display = "none";
        }
      }
    </script>

  </head>
  <body>
    <header>
    <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">Lorem Text</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus quibusdam fugit ullam asperiores mollitia labore eligendi tempora eius consequuntur nemo repellendus consectetur, magnam illum dicta facilis magni fugiat natus doloremque.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">User Profile</h4>
          <ul class="list-unstyled">
            <li><a href="profile.php" class="text-white">My Profile</a></li>
            <li><a href="logout.php" class="text-white">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="./" class="navbar-brand d-flex align-items-center">
        <strong>Classic PHP</strong>
      </a>
      <?php if(isset($_SESSION['uid'])){ ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php } ?>
    </div>
  </div>
</header>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Your Profile</h1>
      <?php if(isset($_GET['succmessage'])){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Well Done!</strong> Your New password is created successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php } ?>
      <?php if(isset($_GET['errmessage'])){ ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $_GET['errmessage']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php } ?>
      
        <div class="form-row">
            <div class="col-md-4 mb-3">
            <label for="validationTooltip01">First name</label>
            <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" value="<?php echo $userData['first_name']; ?>" readonly>
            </div>
            <div class="col-md-4 mb-3">
            <label for="validationTooltip02">Last name</label>
            <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" value="<?php echo $userData['second_name']; ?>" readonly>
            </div>
            <div class="col-md-4 mb-3">
            <label for="validationTooltipUsername">Username</label>
            <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $userData['user_name']; ?>" id="validationTooltipUsername" placeholder="Username" readonly>
                
            </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-12">
            <label for="validationTooltip03">Email</label>
            <input type="text" class="form-control" value="<?php echo $userData['user_email']; ?>" placeholder="Email Address" name="emailAddress" readonly>
            </div>
        </div>
        <hr>
        <!-- Password change form starts from here -->
        <form method="POST">
        <h3 class="jumbotron-heading">Change Password</h1>
        <div class="form-row">
            <div class="col-md-6 mb-6">
                <label for="validationTooltip03">Old Password</label>
                <input type="password" class="form-control" id="oldPSW" placeholder="Old Password" name="oldPass" onchange="checkPassword(this.value);" required>
                <div id="messages"></div>
            </div>
            <div class="col-md-6 mb-6">
                <label for="validationTooltip03">New Password</label>
                <input type="password" class="form-control" id="validationTooltip03" placeholder="New Password" name="newPass" onblur="compareWithOld(this.value);" required>
                <div class="invalid-feedback" id="feedMe">
                  Both Passwords are same Please Choose another password for new.
                </div>
                <div class="valid-tooltip" id="succMe">
                  Looks good!
                </div>
            </div>
        </div>
        <hr>
        <div class="col mt-4">
            <button class="btn btn-primary" id="submit" type="submit" name="submit">Submit form</button>
        </div></form>
      
    </div>
  </section>

</main>
      <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="./js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>
