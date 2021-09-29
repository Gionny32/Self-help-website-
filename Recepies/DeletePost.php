        <?php require_once("includes/DB.php")?>
        <?php require_once("includes/Functions.php")?>
        <?php require_once("includes/Sessions.php")?>


<?php
$SarchQueryParameter = $_GET['id'];

  // Fetching Existing Content according to our
           global $ConnectingDB;
           $sql  = "SELECT * FROM posts WHERE id='$SarchQueryParameter'";
           $stmt = $ConnectingDB ->query($sql);
           while ($DataRows=$stmt->fetch()) {
             $TitleToBeDeleted    = $DataRows['title'];
             $CategoryToBeDeleted = $DataRows['category'];
             $ImageToBeDeleted    = $DataRows['image'];
             $PostToBeDeleted     = $DataRows['post'];
             // code...
           }

//echo $ImageToBeUpdated;
if(isset($_POST["Submit"])){
// Query to Delete Post in DB When everything is fine
    global $ConnectingDB;
    $sql = "DELETE FROM posts WHERE id='$SarchQueryParameter'";
    $Execute= $ConnectingDB->query($sql);
    
    
//var_dump($Execute);
    if($Execute){
      $Target_Path_To_DELETE_Image = "Uploads/$ImageToBeDeleted";
      unlink($Target_Path_To_DELETE_Image);
        
      $_SESSION["SuccessMessage"]="Post Deleted Successfully";
      Redirect_to("post.php");
    }else {
      $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
      Redirect_to("post.php");
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
          <link rel="stylesheet" href="css/style.css">
      <title>Delete Post</title>
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
                    <a href="Post.php" class="nav-link">Post Recipe</a>
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
                    <a href="Recipe.php?page=1" class="nav-link"> Recipes</a>
                  </li>    
                </ul>
                  <ul class="navbar-nav ml-auto">
                  <li class="nav-item"><a href="Logout.php" class="nav-link "><i class="fas fa-user-times text-danger"></i>Logout</a></li>
                  </ul>
              </div>
            </div>
          </nav>


            <!-- PAGE HEADER -->
         <header id="page-header-7">
            <div class="container">
              <div class="row">
                <div class="col-md-6 m-auto text-center"><br>
                  <h1><i class="fas fa-edit" style="color:#27aael;"></i>Delete Recipe </h1>
                  <p>    </p>
                </div>
              </div>
            </div>
          </header> 
            <!-- HEADER END->>


         <!-- Main Area -->
    <section class="container py-2 mb-4">
      <div class="row">
        <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
            
          <?php
           echo ErrorMessage();
           echo SuccessMessage();
            
           ?>
            
    <form class="" action="DeletePost.php?id=<?php echo $SarchQueryParameter; ?>" method="post" enctype="multipart/form-data">
            <div class="card bg-secondary text-light mb-3">
              <div class="card-body bg-dark">
                <div class="form-group">
                  <label for="title"> <span class="FieldInfo"> Post Title: </span></label>
                   <input disabled class="form-control" type="text" name="PostTitle" id="title" placeholder="Type title here" value="<?php echo $TitleToBeDeleted ; ?>">
                </div>
                <div class="form-group">
                  <span class="FieldInfo">Existing Category: </span>
                  <?php echo $CategoryToBeDeleted ;?>
                  <br>
                </div>
                <div class="form-group ">
                  <span class="FieldInfo">Existing Image: </span>
                  <img  class="mb-1" src="Uploads/<?php echo $ImageToBeDeleted ;?>" width="170px"; height="70px"; >
                </div>
                <div class="form-group">
                  <label for="Post"> <span class="FieldInfo"> Post: </span></label>
                  <textarea disabled class="form-control" id="Post" name="PostDescription" rows="8" cols="80">
                    <?php echo $PostToBeDeleted ;?>
                  </textarea>
                </div>
                <div class="row">
                  <div class="col-lg-6 mb-2">
                    <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>
                  </div>
                  <div class="col-lg-6 mb-2">
                    <button type="submit" name="Submit" class="btn btn-danger btn-block">
                      <i class="fas fa-trash"></i> Delete
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
