<?php require_once("includes/DB.php");?>
<?php require_once("includes/Functions.php");?>
<?php require_once("includes/Sessions.php");?>

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
      <title>Blog Page </title>

<style media="screen">
  .heading{
      font-family: Bitter,Georgia,"Times New Roman",Times,serif;
      font-weight: bold;
       color: #005E90;
  }
  .heading:hover{
    color: #0090DB;
  }
  </style>
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
            <a href="journal.php" class="nav-link">Journal</a>
          </li>
          <li class="nav-item active">
            <a href="../CMS1/Blog.php?page=1" class="nav-link">Blog</a>
          </li>
          <li class="nav-item">
              <a href="../StripePayments/pricing.php" class="nav-link">Yoga</a>
          </li>

            <li class="nav-item ">
            <a href="../Recepies/Recipe.php?page=1" class="nav-link">Recipes</a>
          </li>
          <li class="nav-item">
            <a href="../contact/Contact.php" class="nav-link">Contact Us</a>
          </li>
            <ul class="navbar-nav ml-3">
             <form  class="form-inline d-none d-sm-block" action="Blog.php">
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
 <header id="page-header-1">
    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto text-center"><br><br><br>
          <h1><i class="fas fa-edit" style="color:#27aael;"></i>Read Our Blog</h1>
          <p>    </p>
        </div>
      </div>
    </div>
  </header>
        <!-- HEADER END-->

        <!-- Main Area -->

    <div class="container py-2 mb-4 ">
        <div class="row mt-4 ">
        <div class="col-sm-8 ">
            <h1>BLOG</h1>
            <h1 class="lead">The Complete Blog by Parissa Dunkinson</h1>
            <br>

            <?php
            echo ErrorMessage();
            echo SuccessMessage();
            ?>


            <?php
global $ConnectingDB;
      // SQL query when Searh button is active
      if(isset($_GET["SearchButton"])){
        $Search = $_GET["Search"];
        $sql = "SELECT * FROM posts
        WHERE datetime LIKE :search
        OR title LIKE :search
        OR category LIKE :search
        OR post LIKE :search";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':search','%'.$Search.'%');
        $stmt->execute();
      }// Query When Pagination is Active i.e Blog.php?page=1
      elseif (isset($_GET["page"])) {
        $Page = $_GET["page"];
        if($Page==0||$Page<1){
        $ShowPostFrom=0;
      }else{
        $ShowPostFrom=($Page*5)-5;
      }
        $sql ="SELECT * FROM posts ORDER BY id desc LIMIT $ShowPostFrom,5";
        $stmt=$ConnectingDB->query($sql);
      }
      // Query When Category is active in URL Tab
      elseif (isset($_GET["category"])) {
        $Category = $_GET["category"];
        $sql = "SELECT * FROM posts WHERE category='$Category' ORDER BY id desc";
        $stmt=$ConnectingDB->query($sql);
      }

      // The default SQL query
      else{
        $sql  = "SELECT * FROM posts ORDER BY id desc LIMIT 0,3";
        $stmt =$ConnectingDB->query($sql);
      }
      while ($DataRows = $stmt->fetch()) {
        $PostId          = $DataRows["id"];
        $DateTime        = $DataRows["datetime"];
        $PostTitle       = $DataRows["title"];
        $Category        = $DataRows["category"];
        $Admin           = $DataRows["author"];
        $Image           = $DataRows["image"];
        $PostDescription = $DataRows["post"];
      ?>
      <div class="ckeditor">
        <img src="Uploads/<?php echo htmlentities($Image); ?>" style="max-height:450px;" class="img-fluid card-img-top" />
        <div class="ckeditor-body">
          <h4 class="ckeditor-title"><?php echo htmlentities($PostTitle); ?></h4>
          <small class="text-muted">Category: <span class="text-dark"> <a href="Blog.php?category=<?php echo htmlentities($Category); ?>"> <?php echo htmlentities($Category); ?> </a></span> & Written by <span class="text-dark"> <a href="Profile.php?username=<?php echo htmlentities($Admin); ?>"> <?php echo htmlentities($Admin); ?></a></span> On <span class="text-dark"><?php echo htmlentities($DateTime); ?></span></small>
          <span style="float:right;" class="badge badge-dark text-light">Comments:
             <?php echo ApproveCommentsAccordingtoPost($PostId);?>
          </span>
          <hr>
          <p class="ckeditor-text">
            <?php if (strlen($PostDescription)>150) { $PostDescription = substr($PostDescription,0,150)."...";} echo strip_tags($PostDescription); ?></p>
          <a href="FullPost.php?id=<?php echo $PostId; ?>" style="float:right;">
            <span class="btn btn-info">Read More &rang;&rang; </span>
          </a>
          <br>
        </div>
      </div>
      <br>
      <?php   } ?>
      <!-- Pagination -->
      <nav>
        <ul class="pagination pagination-lg">
          <!-- Creating Backward Button -->
          <?php if( isset($Page) ) {
            if ( $Page>1 ) {?>
         <li class="page-item">
             <a href="Blog.php?page=<?php  echo $Page-1; ?>" class="page-link">&laquo;</a>
           </li>
         <?php } }?>
        <?php
        global $ConnectingDB;
        $sql           = "SELECT COUNT(*) FROM posts";
        $stmt          = $ConnectingDB->query($sql);
        $RowPagination = $stmt->fetch();
        $TotalPosts    = array_shift($RowPagination);
        // echo $TotalPosts."<br>";
        $PostPagination=$TotalPosts/5;
        $PostPagination=ceil($PostPagination);
        // echo $PostPagination;
        for ($i=1; $i <=$PostPagination ; $i++) {
          if( isset($Page) ){
            if ($i == $Page) {  ?>
          <li class="page-item active">
            <a href="Blog.php?page=<?php  echo $i; ?>" class="page-link"><?php  echo $i; ?></a>
          </li>
          <?php
        }else {
          ?>  <li class="page-item">
              <a href="Blog.php?page=<?php  echo $i; ?>" class="page-link"><?php  echo $i; ?></a>
            </li>
        <?php  }
      } } ?>
      <!-- Creating Forward Button -->
      <?php if ( isset($Page) && !empty($Page) ) {
        if ($Page+1 <= $PostPagination) {?>
     <li class="page-item">
         <a href="Blog.php?page=<?php  echo $Page+1; ?>" class="page-link">&raquo;</a>
       </li>
     <?php } }?>
        </ul>
      </nav>
    </div>
    <!-- Main Area End-->



          <!-- Side Area Start -->
 <div class="col-sm-4">
      <div class="card mt-4">
        <div class="card-body">
          <img src="img/parissa%20copy.jpg" class="d-block img-fluid mb-3" alt="">
          <div class="text-center">
            About
Parissa Dunkinson, RD, BSc (Hons) Founder of Inside Matters and Freelance Mental Health Dietition
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
            <a href="Blog.php?category=<?php echo $CategoryName; ?>"> <span class="heading"> <?php echo $CategoryName; ?></span> </a><br>
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
            <a style="text-decoration:none;"href="FullPost.php?id=<?php echo htmlentities($Id) ; ?>" target="_blank">  <h6 class="lead"><?php echo htmlentities($Title); ?></h6> </a>
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



<br>

    <!-- FOOTER -->
<footer id="main-footer" class="text-center p-4">
<div class="container">
  <div class="row">
    <div class="col">
      <p>Copyright &copy;<span id="year">
          </span> Inside Matters</p>
    </div>
  </div>
</div>
</footer>

<!-- Footer  Area End -->

<script src="ckeditor/ckeditor.js"></script>
<script>
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
