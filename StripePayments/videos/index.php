<?php include('db.php');

if (isset($_POST['upload'])){

$name = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];

move_uploaded_file($tmp,"upload/".$name);

$sql = "INSERT INTO video(name) VALUES('$name')";
$res = mysqli_query($con,$sql);

if ($res == 1){

  echo'<script>alert("Your Video has been uploaded Successfully")</script';

}

}


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
    <script language="javascript">alert("Thank you ");</script>';

    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="sweetalert2.all.min.js"></script>

    <script src="lib/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/sweet-alert.css">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.1.0/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  <link rel="stylesheet" href="css/style.css">
  <title>Categories</title>
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
            <a href="Post.php" class="nav-link">Post</a>
          </li>
          <li class="nav-item active">
            <a href="index.php" class="nav-link">Videos</a>
          </li>

             <li class="nav-item ">
            <a href="watch.php" class="nav-link"> watch</a>
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
        <div class="col-md-7 m-auto "><br><br>
          <h1><i class="fas fa-edit" style="color:#27aael;"></i>Manage Videos</h1>
          <p>    </p>
        </div>
      </div>
    </div>
  </header>
    <!-- HEADER END-->


    <!--Main Area-->
    <section class="container py-2 mb-4">

    <div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height:500px;">


     <form class="" action="index.php" method="post" enctype="multipart/form-data">
       <div class="card-1 bg-secondary text-light mb-3">
         <div class="card-header">
             <h1>Add New Videos</h1>
         </div>
         <div class="card-body bg-dark">
           <div class="form-group">
              <label for="tittle"><span class="FieldInfo"> Video  </span></label>
               <input class="form-control" type="file" name="file" id="title" placeholder="Type title here"value="">
             </div>
             <div class="row">
             <div class="col-lg-6 mb-2">
                 <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i>Back to Dashboard</a>
                 </div>
                 <div class="col-lg-6 mb-2">
                   <input type="submit"name="upload" id="btn" value="UPLOAD" class="btn btn-primary btn-block">

                   </input>
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

  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
  <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
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
