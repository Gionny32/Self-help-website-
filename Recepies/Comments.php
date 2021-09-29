
<?php require_once("includes/DB.php");?>
<?php require_once("includes/Functions.php");?>
<?php require_once("includes/Sessions.php");?>

<?php $_SESSION["TracKingURL"]=$_SERVER["PHP_SELF"];
Confirm_Login(); ?>


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
  <title>Comments</title>
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
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
            <a href="MyProfile.php" class="nav-link">My Profile</a>
          </li>
          <li class="nav-item">
            <a href="Dashboard.php" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="Post.php" class="nav-link">Post</a>
          </li>
          <li class="nav-item ">
            <a href="Categories.php" class="nav-link">Categories</a>
          </li>
          <li class="nav-item">
            <a href="Admins.php" class="nav-link">Manage Admins</a>
          </li>
          <li class="nav-item active">
            <a href="Comments.php" class="nav-link">Comments</a>
          </li>
             <li class="nav-item ">
            <a href="Recipe.php?page=1" class="nav-link"> Recepies</a>
          </li>    
        </ul>
          <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="Logout.php" class="nav-link "><i class="fas fa-user-times text-danger"></i>Logout</a></li>
          </ul>
      </div>
    </div>
  </nav>
    
    
    <!-- PAGE HEADER -->
 <header id="page-header-4">
    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto text-center"><br>
          <h1><i class="fas fa-comments" style="color:#27aael;"></i>Manage Comments</h1>
          <p>    </p>
        </div>
      </div>
    </div>
  </header> 
    <!-- HEADER END-->
    
<!--Main Area Start -->
<section class="container py-2 mb-4">
      <div class="row" style="min-height:30px;">
        <div class="col-lg-12" style="min-height:400px;">
          <?php
           echo ErrorMessage();
           echo SuccessMessage();
           ?>
          <h2>Un-Approved Comments</h2>
          <table class="table table-striped table-hover text-center">
            <thead class="thead-dark">
              <tr>
                <th>No.</th>
                <th>Date&Time</th>
                <th>Name</th>
                <th>Comment</th>
                <th>Aprove</th>
                <th>Action</th>
                <th>Details</th>
              </tr>
            </thead>
          <?php
          global $ConnectingDB;
          $sql = "SELECT * FROM comments WHERE status='OFF' ORDER BY id desc";
          $Execute =$ConnectingDB->query($sql);
          $SrNo = 0;
          while ($DataRows=$Execute->fetch()) {
            $CommentId = $DataRows["id"];
            $DateTimeOfComment = $DataRows["datetime"];
            $CommenterName = $DataRows["name"];
            $CommentContent= $DataRows["comment"];
            $CommentPostId = $DataRows["post_id"];
            $SrNo++;
          ?>
          <tbody>
            <tr>
              <td><?php echo htmlentities($SrNo); ?></td>
              <td><?php echo htmlentities($DateTimeOfComment); ?></td>
              <td><?php echo htmlentities($CommenterName); ?></td>
              <td><?php echo htmlentities($CommentContent); ?></td>
              <td style="min-width:140px;"> <a href="ApproveComments.php?id=<?php echo $CommentId;?>" class="btn btn-success">Approve</a>  </td>
              <td > <a href="DeleteComments.php?id=<?php echo $CommentId;?>" class="btn btn-danger">Delete</a>  </td>
              <td style="min-width:140px;"> <a class="btn btn-primary"href="FullPost.php?id=<?php echo $CommentPostId; ?>" target="_blank">Live Preview</a> </td>
            </tr>
          </tbody>
          <?php } ?>
          </table>
          <h2>Approved Comments</h2>
          <table class="table table-striped table-hover text-center">
            <thead class="thead-dark">
              <tr>
                <th>No. </th>
                <th>Date&Time</th>
                <th>Name</th>
                <th>Comment</th>
                <th>Approved by</th>
                <th>Revert</th>
                <th>Action</th>
                <th>Details</th>
              </tr>
            </thead>
          <?php
          global $ConnectingDB;
          $sql = "SELECT * FROM comments WHERE status='ON' ORDER BY id desc";
          $Execute =$ConnectingDB->query($sql);
          $SrNo = 0;
          while ($DataRows=$Execute->fetch()) {
            $CommentId         = $DataRows["id"];
            $DateTimeOfComment = $DataRows["datetime"];
            $CommenterName     = $DataRows["name"];
            $ApprovedBy        = $DataRows["approvedby"];
            $CommentContent    = $DataRows["comment"];
            $CommentPostId     = $DataRows["post_id"];
            $SrNo++;
          ?>
          <tbody>
            <tr>
              <td><?php echo htmlentities($SrNo); ?></td>
              <td><?php echo htmlentities($DateTimeOfComment); ?></td>
              <td><?php echo htmlentities($CommenterName); ?></td>
              <td><?php echo htmlentities($CommentContent); ?></td>
              <td><?php echo htmlentities($ApprovedBy); ?></td>
              <td style="min-width:140px;"> <a href="DisApproveComments.php?id=<?php echo $CommentId;?>" class="btn btn-warning">Dis-Approve</a>  </td>
              <td style="min-width:140px;"> <a href="DeleteComments.php?id=<?php echo $CommentId;?>" class="btn btn-danger">Delete</a>  </td>
              <td style="min-width:140px;"> <a class="btn btn-primary"href="FullPost.php?id=<?php echo $CommentPostId; ?>" target="_blank">Live Preview</a> </td>
            </tr>
          </tbody>
          <?php } ?>
          </table>
        </div>
      </div>
    </section>


<!--Main Area End -->





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

<!-- FOOTER END -->
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
