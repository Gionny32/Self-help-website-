<?php require_once("includes/DB.php")?>
<?php require_once("includes/Functions.php")?>
<?php require_once("includes/Sessions.php")?>


<?php Confirm_Login(); ?>
<?php
   $SarchQueryParameter=$_GET['id'];
  if(isset($_POST["Submit"])){
  $PostTitle = $_POST["PostTitle"];
  $Category  = $_POST["Category"];
  $Image     = $_FILES["Image"]["name"];
  $Target    = "Uploads/".basename($_FILES["Image"]["name"]);
  $PostText  = $_POST["PostDescription"];
  $Admin     = "Parissa ";
  date_default_timezone_set("Europe/London");
  $CurrentTime = time();
  $DateTime    = strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);

  if(empty($PostTitle)){
    $_SESSION["ErrorMessage"]= "Title Cant be empty";
    Redirect_to("post.php");
  }elseif (strlen($PostTitle)<5) {
    $_SESSION["ErrorMessage"]= "Post Title should be greater than 5 characters";
    Redirect_to("post.php");
  }elseif (strlen($PostText)>9999) {
    $_SESSION["ErrorMessage"]= "Post Description should be less than than 1000 characters";
    Redirect_to("post.php");
  }else{
    // Query to Update Post in DB When everything is fine
    global $ConnectingDB;
    if (!empty($_FILES["Image"]["name"])) {
      $sql = "UPDATE posts
              SET title='$PostTitle', category='$Category', image='$Image', post='$PostText'
              WHERE id='$SarchQueryParameter'";
    }else {
      $sql = "UPDATE posts
              SET title='$PostTitle', category='$Category', post='$PostText'
              WHERE id='$SarchQueryParameter'";
    }
    $Execute= $ConnectingDB->query($sql);
    move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
    //var_dump($Execute);
    if($Execute){
      $_SESSION["SuccessMessage"]="Post Updated Successfully";
      Redirect_to("post.php");
    }else {
      $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
      Redirect_to("post.php");
    }
  }
} //Ending of Submit Button If-Condition
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



  <script src="https://cdn.tiny.cloud/1/328jof9u1d1z6kj88ibxy9ir4hisa6bc89txqaohcymozpxk/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

          <link rel="stylesheet" href="css/style.css">
      <title>Edit Post</title>
    </head>
    <body>
        <div style="height:10px; background:#ffd662;"></div>
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
                    <a href="MyProfile.php" class="nav-link"></a>
                  </li>
                  <li class="nav-item">
                    <a href="Dashboard.php" class="nav-link">Dashboard</a>
                  </li>
                  <li class="nav-item">
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
                     <li class="nav-item active">
                    <a href="Blog.php?page=1" class="nav-link">Blog</a>
                  </li>
                </ul>
                  <ul class="navbar-nav ml-auto">
                  <li class="nav-item"><a href="Logout.php" class="nav-link "><i class="fas fa-user-times text-danger"></i>Logout</a></li>
                  </ul>
              </div>
            </div>
          </nav>
<div style="height:10px; background:#ffd662;"></div>

            <!-- PAGE HEADER -->
         <header id="page-header-0">
            <div class="container">
              <div class="row">
                <div class="col-md-6 m-auto"><br>
                  <h1><i class="fas fa-edit" style="color:#27aael;"></i>Edit Post</h1>
                  <p>    </p>
                </div>
              </div>
            </div>
          </header>
            <!-- HEADER END-->


         <!-- Main Area -->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
      <?php
       echo ErrorMessage();
       echo SuccessMessage();
       // Fetching Existing Content according to our
       global $ConnectingDB;
       $sql  = "SELECT * FROM posts WHERE id='$SarchQueryParameter'";
       $stmt = $ConnectingDB ->query($sql);
       while ($DataRows=$stmt->fetch()) {
         $TitleToBeUpdated    = $DataRows['title'];
         $CategoryToBeUpdated = $DataRows['category'];
         $ImageToBeUpdated    = $DataRows['image'];
         $PostToBeUpdated     = $DataRows['post'];
         // code...
       }
       ?>
      <form class="" action="EditPost.php?id=<?php echo $SarchQueryParameter; ?>" method="post" enctype="multipart/form-data">
        <div class="card bg-secondary text-light mb-3">
          <div class="card-body bg-dark">
            <div class="form-group">
              <label for="title"> <span class="FieldInfo"> Post Title: </span></label>
               <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Type title here" value="<?php echo $TitleToBeUpdated; ?>">
            </div>
            <div class="form-group">
              <span class="FieldInfo">Existing Category: </span>
              <?php echo $CategoryToBeUpdated;?>
              <br>
              <label for="CategoryTitle"> <span class="FieldInfo"> Chose Categroy </span></label>
               <select class="form-control" id="CategoryTitle"  name="Category">
                 <?php
                 //Fetchinng all the categories from category table
                 global $ConnectingDB;
                 $sql  = "SELECT id,title FROM category";
                 $stmt = $ConnectingDB->query($sql);
                 while ($DataRows = $stmt->fetch()) {
                   $Id            = $DataRows["id"];
                   $CategoryName  = $DataRows["title"];
                  ?>
                  <option> <?php echo $CategoryName; ?></option>
                  <?php } ?>
               </select>
            </div>
            <div class="form=group mb-1">
              <span class="FieldInfo">Existing Image: </span>
              <img  class="mb-1" src="Uploads/<?php echo $ImageToBeUpdated;?>" width="170px"; height="70px"; >
              <div class="custom-file">
              <input class="custom-file-input" type="File" name="Image" id="imageSelect" value="">
              <label for="imageSelect" class="custom-file-label">Select Image </label>
              </div>
            </div>

            <div class="form-group">
              <label for="Post"> <span class="FieldInfo"> Post: </span></label>
              <texature class="form-control" id="Post" name="PostDescription" rows="8" cols="80">
            <?php echo $PostToBeUpdated;?>
                </texature>


            </div>
            <div class="row">
              <div class="col-lg-6 mb-2">
                <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>
              </div>
              <div class="col-lg-6 mb-2">
                <button type="submit" name="Submit" class="btn btn-success btn-block">
                  <i class="fas fa-check"></i> Publish
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

</section>
            <!--Main end-->


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
