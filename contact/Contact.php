
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
  <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="style.css">
  <title>INSIDE MATTERS</title>
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
      <a href="../index.php" class="navbar-brand">INSIDE MATTERS</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="../index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item ">
            <a href="../about/about.php" class="nav-link">About Us</a>
          </li>
          <li class="nav-item">
            <a href="journal.php" class="nav-link">Journal</a>
          </li>
          <li class="nav-item">
            <a href="../CMS%20/Blog.php?page=1" class="nav-link">Blog</a>
          </li>

            <li class="nav-item">
                  <a href="yoga.php" class="nav-link">Yoga</a>
              </li>
             <li class="nav-item ">
                <a href="../Recepies/Recipe.php" class="nav-link">Recipes</a>
              </li>

          <li class="nav-item active">
            <a href="Contact.php" class="nav-link">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

     <!-- PAGE HEADER -->
  <header id="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto text-center">
          <h1>Contact Us</h1>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas, temporibus?</p>
        </div>
      </div>
    </div>
  </header>






    <!-- CONTACT SECTION -->
  <section id="contact" class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card p-4">
            <div class="card-body">
              <h4>Get In Touch</h4>
              <p>Please contact a Dietitian or GP for advice or concerns for Eating Disorders directly. No one should suffer alone and should be supported for this directly within a Multidisciplinary team of professionals. <br> Do not use this service to replace any medical advice you have received about a recent diagnosis.
              <br><br>Mon – Thur 9 am - 4.30 pm</p>
              <h4>Address</h4>
              <p>550 Main st, Boston MA</p>
              <h4>Email</h4>
              <p>Parissa.insidematters@gmail.com</p>
              <h4>Phone</h4>
              <p>(555) 555-5555</p>
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <div class="card p-4">
            <div class="card-body">
             <h2 class="text-center py-2"> Please fill out this form to contact us</h2><hr>
    <form  action="" id="contact-form" method="post" role="form">

     <div class="messages"></div>

     <div class="controls">

    <div class="row">
    <div class="col-md-6">
    <div class="form-group">
    <label for="form_name">Firstname *</label>
     <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
    <div class="help-block with-errors"></div>
    </div>
   </div>
    <div class="col-md-6">
    <div class="form-group">
    <label for="form_lastname">Lastname *</label>
    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
    <div class="help-block with-errors"></div>
    </div>
    </div>
   </div>
   <div class="row">
    <div class="col-md-6">
    <div class="form-group">
    <label for="form_email">Email *</label>
    <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
    <div class="help-block with-errors"></div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
    <label for="form_phone">Phone</label>
    <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
    <div class="help-block with-errors"></div>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-12">
    <div class="form-group">
    <label for="form_message">Message *</label>
    <textarea id="post" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
 <div class="help-block with-errors"></div>
    </div>
    </div>
    <div class="col-md-12">
    <input type="submit" name="ok" class="btn btn-success btn-send" value="Send message">
    </div>
    </div>
    <div class="row">
    <div class="col-md-12">
  <p class="text-muted"><strong>*</strong> These fields are required.<a href="https://hubbunch.com" target="_blank"></a>.</p>
 </div>
</div>
</div>
</form>


                    <?php
                if(isset($_POST['ok'])){
                    include_once 'function.php';
                    $obj=new Contact();
                    $res=$obj->contact_us($_POST);
                    if($res==true){
                        echo "<script>alert('Query successfully Submitted.Thank you')</script>";
                    }else{
                        echo "<script>alert('Something Went wrong!!')</script>";
                    }
                }
                ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>





      <!-- STAFF -->
  <section id="staff" class="py-5 text-center bg-dark text-white">
    <div class="container">
      <h1>Follow Us On Media</h1>
        <br><br>
      <hr>
      <div class="middle">
      <a class="bt" href="#">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a class="bt" href="#">
        <i class="fab fa-twitter"></i>
      </a>
      <a class="bt" href="https://www.google.co.uk/">
        <i class="fab fa-google"></i>
      </a>
      <a class="bt" href="https://www.instagram.com/parissa.insidematters/">
        <i class="fab fa-instagram"></i>
      </a>
      <a class="bt" href="#">
        <i class="fab fa-youtube"></i>
      </a>
    </div>
    </div>
  </section>

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


<script src="//cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
  <script>

   CKEDITOR.replace( 'Post');

  </script>

  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="validator.js"></script>
<script src="contact.js"></script>
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
