    <?php require_once("includes/DB.php"); ?>
    <?php require_once("includes/Functions.php"); ?>
    <?php require_once("includes/Sessions.php"); ?>

    <?php $_SESSION["TracKingURL"]=$_SERVER["PHP_SELF"];
          Confirm_Login();  ?>

    <?php

    if(isset($_POST["Submit"])){
      $PostTitle = $_POST['PostTitle'];
      $Category  = $_POST['Category'];
      $Image     = $_FILES['Image']['name'];
      $Image_tmp = $_FILES["Image"]["tmp_name"];
      $PostText  = $_POST["PostDescription"];
      $Admin     = $_SESSION["UserName"];

      //DAteTime start

      date_default_timezone_set("Europe/London");
      $CurrenTime=time();
      $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrenTime);

     //DateTime end

      if(empty($PostTitle)){
        $_SESSION["ErrorMessage"]= "Title Cant be empty";
        Redirect_to("AddNewPost.php");
      }elseif (strlen($PostTitle)<5){
        $_SESSION["ErrorMessage"]= "Post title schould be greater than 5 characters";
        Redirect_to("AddNewPost.php");

      }elseif (strlen($PostText)>9999){
       $_SESSION["ErrorMessage"]= "Post Description schould be less than 10000 characters";
       Redirect_to("AddNewPost.php");
      }else{
        //Query to insert post in DB when everything is fine

        // I'm inserting this global function if php7 will be use to run this file it want crask.
        global $ConnectingDB;

        $sql = "INSERT INTO posts(datetime,title,category,author,image,post)";
        $sql .= "VALUES(:dateTime,:postTitle,:categoryName,:adminName,:imageName,:postDescription)";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':dateTime',$DateTime);
        $stmt->bindValue(':postTitle',$PostTitle);
        $stmt->bindValue(':categoryName',$Category);
        $stmt->bindValue(':adminName',$Admin);
        $stmt->bindValue(':imageName',$Image);
        $stmt->bindValue(':postDescription',$PostText);
        $Execute=$stmt->execute();

        move_uploaded_file($Image_tmp,"Uploads/$Image");



        if($Execute){

          $_SESSION["SuccessMessage"]="Post with id : " .$ConnectingDB->lastInsertId()." New Post Has been added Successfully";
          Redirect_to("AddNewPost.php");
        }else {
          $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
          Redirect_to("AddNewPost.php");
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

           <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>>

      <link rel="stylesheet" href="css/style.css">

      <title>Add New Post </title>


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
              <li class="nav-item active">
                <a href="Post.php" class="nav-link">Post</a>
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

        <!-- PAGE HEADER -->
     <header id="page-header-0">
        <div class="container">
          <div class="row">
            <div class="col-md-6 m-auto text-center"><br>
              <h1><i class="fas fa-edit" style="color:#27aael;"></i>Add New Post</h1>
              <p>    </p>
            </div>
          </div>
        </div>
      </header>
        <!-- HEADER END-->


        <!--Main Area-->
    <section class="container py-2 mb-4">
        <div class="row">
        <div class="offset-lg-1 col-lg-10" style="min-height:400px;">

            <?php
            echo ErrorMessage();
            echo SuccessMessage();
            ?>

      <form  action="AddNewPost.php"  method="post" enctype="multipart/form-data">
            <div class="card bg-secondary text-light mb-3">
              <div class="card-body bg-dark">
                <div class="form-group">
                  <label for="title"> <span class="FieldInfo"> Post Title: </span></label>
                   <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Type title here" value="">
                </div>
                <div class="form-group">
                  <label for="CategoryTitle"> <span class="FieldInfo"> Chose Categroy </span></label>
                   <select class="form-control" id="CategoryTitle"  name="Category">

                     <?php
                     //Fetchinng all the categories from category table
                     global $ConnectingDB;
                     $sql = "SELECT id,title FROM category";
                     $stmt = $ConnectingDB->query($sql);
                     while ($DataRows = $stmt->fetch()) {
                       $Id = $DataRows["id"];
                       $CategoryName = $DataRows["title"];
                      ?>
                      <option> <?php echo $CategoryName; ?></option>
                      <?php } ?>
                   </select>
                </div>
                <div class="form-group">
                  <div class="custom-file">
                  <input class="custom-file-input" type="File" name="Image" id="imageSelect" value="">
                  <label for="imageSelect" class="custom-file-label">Select Image </label>
                  </div>
                </div>



                <div class="form-group">
                  <label for="Post"> <span class="FieldInfo"> Post: </span></label>

                  <textarea  class="ckeditor" id="Post" name="PostDescription" rows="8" cols="80"></textarea>
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




        <script >

        // Get the current year for the copyright
        $('#year').text(new Date().getFullYear());



        </script>



    </body>

    </html>
