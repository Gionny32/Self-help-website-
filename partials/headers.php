<?php
include_once 'resource/session.php';
include_once 'resource/Database.php';
include_once 'resource/utilities.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
      crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
      crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
    <link rel="stylesheet" href="css/style.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php if(isset($page_title)) echo $page_title; ?></title>


    <script src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  <!--  <script src='https://www.google.com/recaptcha/api.js'></script> -->
</head>
<body>

<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand ">INSIDE MATTERS</a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto"><i class="hide"<?php echo guard(); ?>></i>
                <li "nav-item"><a href="index.php"class="nav-link">Home</a></li>
                <?php if((isset($_SESSION['username']) || isCookieValid($db))): ?>
                    <li><a href="profile.php" class="nav-link">My Profile</a></li>
                    <li><a href="about/about.php" class="nav-link">About Us</a></li>
                    <li><a href="pdf/journal.php" class="nav-link">Journal</a></li>
                    <li><a href="CMS1/Blog.php?page=1" class="nav-link">Blog</a></li>
                    <li><a href="StripePayments/pricing.php" class="nav-link">Yoga</a></li>
                    <li><a href="Recepies/Recipe.php?page=1" class="nav-link">Recipes</a></li>
                    <li><a href="contact/Contact.php" class="nav-link">Contact Us</a></li>
                    <li><a href="members.php" class="nav-link">Members</a></li>
                    <li><a href="logout.php" class="nav-link">Logout</a></li>

                <?php else: ?>
                    <li><a href="#about" class="nav-link">About</a></li>
                    <li><a href="members.php" class="nav-link">Members</a></li>
                    <li><a href="login.php" class="nav-link">Login</a></li>
                    <li><a href="signup.php" class="nav-link">Sign up</a></li>
                <?php endif ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
