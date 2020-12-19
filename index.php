<?php session_start();
include_once 'User.php';
$user = new User();
if(isset($_SESSION['uid'])) $uid = $_SESSION['uid'];
// if (!$user->get_session()){
//  header("location:login.php");
// }


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
      <h1 class="jumbotron-heading">Classic PHP</h1>
      <?php if(isset($_SESSION['uid'])){ ?>
          <p class="lead text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dicta ipsam magnam, a esse dignissimos at libero mollitia asperiores inventore. Atque voluptas fugiat quidem? Quia obcaecati inventore facilis pariatur tempore.</p>
          <a href="logout.php" class="btn btn-secondary my-2">Logout</a>
      <?php } else { ?>
        <p class="lead text-muted">You can see these contents after login</p>
        <p>
        <a href="register.php" class="btn btn-primary my-2">Register</a>
        <a href="login.php" class="btn btn-secondary my-2">login</a>
      </p>
      <?php } ?>
      
      
    </div>
  </section>

</main>


<script src="./js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="./js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>
