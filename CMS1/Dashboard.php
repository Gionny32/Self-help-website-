<?php require_once("includes/DB.php"); ?>
<?php require_once("includes/Functions.php"); ?>
<?php require_once("includes/Sessions.php"); ?>
<?php
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
//echo $_SESSION["TrackingURL"];
Confirm_Login(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Dashboard</title>
</head>

<body>
    <div style="height:10px; background:#ffd662;"></div>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
    <div class="container">
      <a href="index.html" class="navbar-brand">INSIDE MATTERS</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <!--<li class="nav-item">
            <a href="index.html" class="nav-link">Home</a>
          </li> -->
            <li class="nav-item">
            <a href="MyProfile.php" class="nav-link"></a>
          </li>
          <li class="nav-item active">
            <a href="Dashboard.php" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item ">
            <a href="post.php" class="nav-link">Post</a>
          </li>
          <li class="nav-item ">
            <a href="Categories.php" class="nav-link">Categories</a>
          </li>
          <li class="nav-item">
            <a href="Admins.php" class="nav-link">Manage Admins</a>
          </li>
          <li class="nav-item">
            <a href="Comments.php" class="nav-link">Comments</a>
          </li>
             <li class="nav-item ">
            <a href="Blog.php?page=1" class="nav-link"> Blog</a>
          </li>    
        </ul>
          <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="Logout.php" class="nav-link "><i class="fas fa-user-times text-danger"></i>Logout</a></li>
          </ul>
      </div>
    </div>
  </nav>
   <div style="height:10px; background:#ffd662;"></div> 

        <!-- HEADER -->
    
    
       <!-- PAGE HEADER -->
    
    
   <header id="page-header-0">
      <div class="container">
        <div class="row">
          <div class="col-md-12 m-auto "><br>
          <h1><i class="fas fa-tachometer-alt" style="color:#27aae1;"></i> Dashboard</h1>
               <br><br>
          </div>
           
          <div class="col-lg-3 mb-2">
            <a href="AddNewPost.php" class="btn btn-primary btn-block">
              <i class="fas fa-edit"></i> Add New Post
            </a>
          </div>
          <div class="col-lg-3 mb-2">
            <a href="Categories.php" class="btn btn-info btn-block">
              <i class="fas fa-folder-plus"></i> Add New Category
            </a>
          </div>
          <div class="col-lg-3 mb-2">
            <a href="Admins.php" class="btn btn-warning btn-block">
              <i class="fas fa-user-plus"></i> Add New Admin
            </a>
          </div>
          <div class="col-lg-3 mb-2">
            <a href="Comments.php" class="btn btn-success btn-block">
              <i class="fas fa-check"></i> Approve Comments
            </a>
          </div>

        </div>
      </div>
    </header>
    <!-- HEADER END -->
    
    <!-- Main Area -->
    <section class="container py-2 mb-4">
      <div class="row">
         <!-- Left Side Area Start -->
        <div class="col-lg-2 d-none d-md-block">
          <div class="card text-center bg-dark text-white mb-3">
            <div class="card-body">
              <h1 class="lead">Posts</h1>
              <h4 class="display-5">
                <i class="fab fa-readme"></i>
                <?php TotalPosts(); ?>
              </h4>
            </div>
          </div>

          <div class="card text-center bg-dark text-white mb-3">
            <div class="card-body">
              <h1 class="lead">Categories</h1>
              <h4 class="display-5">
                <i class="fas fa-folder"></i>
                <?php TotalCategories(); ?>
              </h4>
            </div>
          </div>

          <div class="card text-center bg-dark text-white mb-3">
            <div class="card-body">
              <h1 class="lead">Admins</h1>
              <h4 class="display-5">
                <i class="fas fa-users"></i>
                <?php TotalAdmins(); ?>
              </h4>
            </div>
          </div>
          <div class="card text-center bg-dark text-white mb-3">
            <div class="card-body">
              <h1 class="lead">Comments</h1>
              <h4 class="display-5">
                <i class="fas fa-comments"></i>
                <?php TotalComments(); ?>
              </h4>
            </div>
          </div>

        </div>
        <!-- Left Side Area End -->
        <!-- Right Side Area Start -->
        <div class="col-lg-10">
          <?php
           echo ErrorMessage();
           echo SuccessMessage();
           ?>
          <h1>Top Posts</h1>
          <table class="table table-striped table-hover">
            <thead class="thead-dark">
              <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Date&Time</th>
                <th>Author</th>
                <th>Comments</th>
                <th>Details</th>
              </tr>
            </thead>
            <?php
            $SrNo = 0;
            global $ConnectingDB;
            $sql = "SELECT * FROM posts ORDER BY id desc LIMIT 0,6";
            $stmt=$ConnectingDB->query($sql);
            while ($DataRows=$stmt->fetch()) {
              $PostId = $DataRows["id"];
              $DateTime = $DataRows["datetime"];
              $Author  = $DataRows["author"];
              $Title = $DataRows["title"];
              $SrNo++;
             ?>
            <tbody>
              <tr>
                <td><?php echo $SrNo; ?></td>
                <td><?php echo $Title; ?></td>
                <td><?php echo $DateTime; ?></td>
                <td><?php echo $Author; ?></td>
                <td>
                    <?php $Total = ApproveCommentsAccordingtoPost($PostId);
                    if ($Total>0) {
                      ?>
                      <span class="badge badge-success">
                        <?php
                      echo $Total; ?>
                      </span>
                        <?php  }   ?>
                  <?php $Total = DisApproveCommentsAccordingtoPost($PostId);
                  if ($Total>0) {  ?>
                    <span class="badge badge-danger">
                      <?php
                      echo $Total; ?>
                    </span>
                         <?php  }  ?>
                </td>
                <td> <a target="_blank" href="FullPost.php?id=<?php echo $PostId; ?>">
                  <span class="btn btn-info">Preview</span>
                </a>
              </td>
              </tr>
            </tbody>
            <?php } ?>

          </table>

        </div>
        <!-- Right Side Area End -->


      </div>
    </section>
    <!-- Main Area End -->

    
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