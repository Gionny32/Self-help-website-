<?php require_once("includes/DB.php");?>
<?php require_once("includes/Functions.php");?>
<?php require_once("includes/Sessions.php");?>
<?php $SearchQueryParameter = $_GET["id"];?>


<?php
if(isset($_POST["Submit"])){
  $Name    = $_POST["CommenterName"];
  $Email   = $_POST["CommenterEmail"];
  $Comment = $_POST["CommenterThoughts"];
  //DAteTime start

  date_default_timezone_set("Europe/London");
  $CurrenTime=time();
  $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrenTime);

 //DateTime end

  if(empty($Name)||empty ($Email)|| empty($Comment)){
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    Redirect_to("FullPost.php?id={$SearchQueryParameter}");
  }elseif (strlen($Comment)>500){
    $_SESSION["ErrorMessage"]= "Comment length should be less  than 500 characters";
    Redirect_to("FullPost.php?id={$SearchQueryParameter}");

  }else{
    //Query to insert comments in DB when everything is fine

    global $ConnectingDB; // I'm inserting this global function if php7 will be use to run this file and it want crask.


    $sql = "INSERT INTO comments(datetime,name,email,comment,approvedby,status,post_id)";
    $sql .= "VALUES(:dateTime,:name,:email,:comment,'Pending','OFF',:postIdFromURL)";// we insert dominame to avoid any sql injection.
    $stmt = $ConnectingDB->prepare($sql);//-> means we using pdo objects
    $stmt->bindValue(':dateTime',$DateTime);
    $stmt->bindValue(':name',$Name);
    $stmt->bindValue(':email',$Email);
    $stmt->bindValue(':comment',$Comment);
    $stmt->bindValue(':postIdFromURL',$SearchQueryParameter);
    $Execute=$stmt->execute();

    if($Execute){
    $_SESSION["SuccessMessage"]= "Comment Submited Successfully";
    Redirect_to("FullPost.php?id={$SearchQueryParameter}");
  } else {
     $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
     Redirect_to("FullPost.php?id={$SearchQueryParameter}");

      }
  }
}//Ending of Submit Buttom If-Condition

 ?>
  <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
      <title> Full Resipe Page </title>
    </head>

    <body>
      <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark ">
    <div class="container">
      <a href="../index.php" class="navbar-brand">INSIDE MATTERS</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a href="../index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="../about/about.php" class="nav-link">About Us </a>
          </li>
          <li class="nav-item">
            <a href="services.php" class="nav-link">Services</a>
          </li>
          <li class="nav-item active">
            <a href="Recipe.php?page=1" class="nav-link">Recipes</a>
          </li>
          <li class="nav-item">
              <a href="yoga.php" class="nav-link">Yoga</a>
          </li>
          <li class="nav-item">
            <a href="contact.php" class="nav-link">Contact Us</a>
          </li>
            <ul class="navbar-nav ml-3">
             <form  class="form-inline d-none d-sm-block" action="Recipe.php">
                <div class="form-group">
                <input class="form-control mr-2" type="text" name="Search" placeholder="Search here" value="">
                <button class="btn btn-primary" name="SearchButton">Go</button>


                 </div>
            </form>
            </ul>
        </ul>
      </div>
    </div>
  </nav>

       <!-- PAGE HEADER -->
     <header id="page-header-8"><br>
        <div class="container text-right pt-5 ">
          <div class="row">
            <div class="col-md-6 mt-auto  "><br>
              <h1 ><i class="fas fa-glasses" style="color:#27aael; "></i> Our Recipes</h1>
              <p>    </p>
            </div>
          </div>
        </div>
      </header>


        <!-- HEADER END-->

        <!-- Main Area -->

    <div class="container py-2 mb-4">
        <div class="row mt-4">
        <div class="col-sm-8">
            <h1> The Complete Responsive CMS Blog</h1>
            <h1 class="lead">The Complete Blog by using php by Giovanni Sturiale</h1>
              <?php
                 echo ErrorMessage();
                 echo SuccessMessage();
               ?>
            <?php
            global $ConnectingDB;
            //SQL query when Search button is active
            if(isset($_GET["SearchButton"])){
               $Search = $_GET["Search"];
               $sql = "SELECT * FROM posts WHERE datetime LIKE :search
               OR title LIKE :search
               OR category LIKE :search
               OR post LIKE :search";
                $stmt = $ConnectingDB->prepare($sql);
                $stmt->bindValue(':search','%'.$Search.'%');
                $stmt->execute();
            }

            //The defoult SQL query
            else{
                $PostIdFromURL = $_GET["id"];
                if (!isset($PostIdFromURL)){
                    $_SESSION["ErrorMessage"]="Bad Request !";
                    Redirect_to("Recipe.php");

                }
                $sql = "SELECT * FROM posts  WHERE id= '$PostIdFromURL'";
                $stmt = $ConnectingDB->query($sql);
            }
            while ($DataRows = $stmt->fetch()){
              $PostId           = $DataRows["id"];
              $DateTime         = $DataRows["datetime"];
              $PostTitle        = $DataRows["title"];
              $Category         = $DataRows["category"];
              $Admin            = $DataRows["author"];
              $Image            = $DataRows["image"];
              $PostDescription  = $DataRows["post"];

             ?>
            <div class="card mb-3">
                <img src="Uploads/<?php echo htmlentities($Image);?>" Style="max-height:550px;" class="img-fluid  card-img-top"/>
              <div class="card-body ">
                <h4 class="card-title"><?php echo htmlentities($PostTitle); ?></h4>
                <small class="text-muted"> Category:<span class="text-dark"><?php echo htmlentities($Category);?> </span> & Writen by <span class="text-dark"> <?php echo htmlentities($Admin);?></span> On <span class="text-dark"><?php echo htmlentities ($DateTime); ?></span></small>

                  <hr>


                  <p class="card_text">
                      <?php echo strip_tags($PostDescription); ?></p>
                  <a href="FullPost.php?id=?<?php echo $PostId; ?>" style="float:right;">

                  </a>
                </div>
            </div>
            <br>
            <?php } ?>

            <!-- Comment Part Start -->

            <!--Feching existing comment Start -->
            <span class="FieldInfo">Comments</span>
            <br><br>
            <?php global $ConnectingDB;
            $sql  = "SELECT * FROM comments
             WHERE post_id='$SearchQueryParameter' AND status='ON'";
            $stmt =$ConnectingDB->query($sql);
            while($DataRows = $stmt->fetch()){
               $CommentDate= $DataRows['datetime'];
               $CommenterName= $DataRows['name'];
               $CommentContent= $DataRows['comment'];


            ?>

<div>
    <div class="media CommentBlock">
      <img class="d-block img-fluid align-self-start" src="img/comment.png" alt="">
      <div class="media-body ml-2">
        <h6 class="lead"><?php echo $CommenterName; ?></h6>
        <p class="small"><?php echo $CommentDate; ?></p>
        <p><?php echo $CommentContent; ?></p>
      </div>
    </div>
  </div>
  <hr>

          <?php  }?>
            <!--Feching existing comment End -->
             <div>
            <form class="" action="FullPost.php?id=<?php echo $SearchQueryParameter ?>" method="post">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="FieldInfo">Share your thoughts about this Recipe</h5>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                      </div>
                    <input class="form-control" type="text" name="CommenterName" placeholder="Name" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                      </div>
                    <input class="form-control" type="text" name="CommenterEmail" placeholder="Email" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <textarea name="CommenterThoughts" id="Post" class="form-control" rows="6" cols="80"></textarea>
                  </div>
                  <div class="">
                    <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>


            <!-- Comment Part End-->
            </div>

           <!-- End main Area -->




        <!-- Side Area Start -->
        <div class="col-sm-4">
          <div class="card mt-4">
            <div class="card-body">
              <img src="img/about-us%20copy.jpg" class="d-block img-fluid mb-3" alt="">
              <div class="text-center">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </div>
            </div>
          </div>
          <br>
          <div class="card">
            <div class="card-header bg-dark text-light">
              <h2 class="lead">Sign Up !</h2>
            </div>
            <div class="card-body">
              <button type="button" class="btn btn-success btn-block text-center text-white mb-4" name="button">Join the Forum</button>
              <button type="button" class="btn btn-danger btn-block text-center text-white mb-4" name="button">Login</button>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="" placeholder="Enter your email"value="">
                <div class="input-group-append">
                  <button type="button" class="btn btn-primary btn-sm text-center text-white" name="button">Subscribe Now</button>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="card">
            <div class="card-header bg-primary text-light">
              <h2 class="lead">Categories</h2>
              </div>
              <div class="card-body">
                <?php
                global $ConnectingDB;
                $sql = "SELECT * FROM category ORDER BY id desc";
                $stmt = $ConnectingDB->query($sql);
                while ($DataRows = $stmt->fetch()) {
                  $CategoryId = $DataRows["id"];
                  $CategoryName=$DataRows["title"];
                 ?>
                <a href="Recipe.php?category=<?php echo $CategoryName; ?>"> <span class="heading"> <?php echo $CategoryName; ?></span> </a><br>
               <?php } ?>
            </div>
          </div>
          <br>
          <div class="card">
            <div class="card-header bg-info text-white">
              <h2 class="lead"> Recent Posts</h2>
            </div>
            <div class="card-body">
              <?php
              global $ConnectingDB;
              $sql= "SELECT * FROM posts ORDER BY id desc LIMIT 0,5";
              $stmt= $ConnectingDB->query($sql);
              while ($DataRows=$stmt->fetch()) {
                $Id     = $DataRows['id'];
                $Title  = $DataRows['title'];
                $DateTime = $DataRows['datetime'];
                $Image = $DataRows['image'];
              ?>
              <div class="media">
                <img src="Uploads/<?php echo htmlentities($Image); ?>" class="d-block img-fluid align-self-start"  width="90" height="94" alt="">
                <div class="media-body ml-2">
                <a style="text-decoration:none;" href="FullPost.php?id=<?php echo htmlentities($Id) ; ?>" target="_blank">  <h6 class="lead"><?php echo htmlentities($Title); ?></h6> </a>
                  <p class="small"><?php echo htmlentities($DateTime); ?></p>
                </div>
              </div>
              <hr>
              <?php } ?>
            </div>
          </div>

        </div>
        <!-- Side Area End -->
      </div>

    </div>

<!-- FOOTER -->
       <footer id="main-footer" class="text-center p-4">
            <div class="container">
              <div class="row">
                <div class="col">
                  <p>Copyright &copy;
                    <span id="year"></span> Inside Matters</p>
                </div>
              </div>
            </div>
           </footer>
<!--Footer End -->

<script src="ckeditor/ckeditor.js"></script>
<script>

 CKEDITOR.replace( 'Post');

</script>

      <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>

      <script>
        // Get the current year for the copyright
        $('#year').text(new Date().getFullYear());

      </script>
    </body>

    </html>
