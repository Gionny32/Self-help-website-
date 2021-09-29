<?php require_once("includes/DB.php");?>
<?php require_once("includes/Functions.php");?>
<?php require_once("includes/Sessions.php");?>


<?php
$_SESSION["TracKingURL"]=$_SERVER["PHP_SELF"];
Confirm_Login(); ?>

<?php
if(isset($_POST["Submit"])){
  $Category = $_POST["CategoryTitle"];
  $Admin = $_SESSION["UserName"];  
//DAteTime start
  date_default_timezone_set("Europe/London");
  $CurrenTime=time();
  $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrenTime);
//DateTime end
    
  if(empty($Category)){
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    Redirect_to("Categories.php");     
  }elseif (strlen($Category)<3){
    $_SESSION["ErrorMessage"]= "Category title schould be greater than 3 characters";
    Redirect_to("Categories.php");   
      
  }elseif (strlen($Category)>49){
   $_SESSION["ErrorMessage"]= "Category title schould be less than 50 characters";
   Redirect_to("Categories.php");
  }else{
    //Query to kinsert category in DB when everything is fine
      
    global $ConnectingDB; // I'm inserting this global function if php7 will be use to run this file and it want crask. 
      
    
    $sql = "INSERT INTO category(title,author,datetime)";
    $sql .= "VALUES(:categoryName,:adminName,:dateTime)";// we insert dominame to avoid any sql injection.
    $stmt = $ConnectingDB->prepare($sql);//-> means we using pdo objects 
    $stmt->bindValue(':categoryName',$Category);
    $stmt->bindValue(':adminName',$Admin);
    $stmt->bindValue(':dateTime',$DateTime);
    $Execute=$stmt->execute();
      
    if($Execute){
    $_SESSION["SuccessMessage"]="Category with id : ".$ConnectingDB->lastInsertId()."Added Successfully";
    Redirect_to("Categories.php");
  } else { 
     $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
     Redirect_to("Categories.php");
             
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
  <title>Categories</title>
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
          <li class="nav-item active">
            <a href="Categories.php" class="nav-link">Categories</a>
          </li>
          <li class="nav-item">
            <a href="Admins.php" class="nav-link">Manage Admins</a>
          </li>
          <li class="nav-item">
            <a href="Comments.php" class="nav-link">Comments</a>
          </li>
             <li class="nav-item ">
            <a href="Recipes.php?page=1" class="nav-link"> Recepies</a>
          </li>    
        </ul>
          <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="Logout.php" class="nav-link "><i class="fas fa-user-times text-danger"></i>Logout</a></li>
          </ul>
      </div>
    </div>
  </nav>
    
    
    <!-- PAGE HEADER -->
 <header id="page-header-3">
    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto text-center"><br>
          <h1><i class="fas fa-edit" style="color:#27aael;"></i>Manage Categories</h1>
          <p>    </p>
        </div>
      </div>
    </div>
  </header> 
    <!-- HEADER END->>
    
    
    <!--Main Area-->
    <section class="container py-2 mb-4">
    
    <div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
        
        <?php
        echo ErrorMessage();
        echo SuccessMessage();
        ?>
        
     <form class="" action="Categories.php" method="post">
       <div class="card bg-secondary text-light mb-3">
         <div class="card-header">
             <h1>Add New Category</h1>
         </div>
         <div class="card-body bg-dark">
           <div class="form-group">
              <label for="tittle"><span class="FieldInfo"> Category Title </span></label> 
               <input class="form-control" type="text" name="CategoryTitle" id="title" placeholder="Type title here"value="">
             </div>
             <div class="row">
             <div class="col-lg-6 mb-2">
                 <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i>Back to Dashboard</a>
                 </div>
                 <div class="col-lg-6 mb-2">
                   <button type="submit"name="Submit" class="btn btn-success btn-block">
                     <i class="fas fa-check"></i>Publish
                   </button>
                 </div>
             </div>
           </div>
         </div>
      </form>
        
          <h2>Existing Categories</h2>
          <table class="table table-striped table-hover text-center">
            <thead class="thead-dark">
              <tr>
                <th>No. </th>
                <th>Date&Time</th>
                <th>Category Name</th>
                <th>Creator Name</th>
                <th>Action</th>
              </tr>
            </thead>
          <?php
          global $ConnectingDB;
          $sql = "SELECT * FROM category ORDER BY id desc";
          $Execute =$ConnectingDB->query($sql);
          $SrNo = 0;
          while ($DataRows=$Execute->fetch()) {
            $CategoryId    = $DataRows["id"];
            $CategoryDate  = $DataRows["datetime"];
            $CategoryName  = $DataRows["title"];
            $CreatorName   = $DataRows["author"];
            $SrNo++;
          ?>
          <tbody>
            <tr>
              <td><?php echo htmlentities($SrNo); ?></td>
              <td><?php echo htmlentities($CategoryDate); ?></td>
              <td><?php echo htmlentities($CategoryName); ?></td>
              <td><?php echo htmlentities($CreatorName) ; ?></td>  
              <td style="min-width:140px;"> <a href="DeleteCategory.php?id=<?php echo $CategoryId;?>" class="btn btn-danger">Delete</a>  </td>
            </tr>
          </tbody>
          <?php } ?>
          </table>        
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
