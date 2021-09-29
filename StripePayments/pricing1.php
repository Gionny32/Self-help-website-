<?php
    require_once "config.php";
?>
<!doctype html>
<html lang="en">
<head>



  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
      crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
      crossorigin="anonymous">


    <link rel="stylesheet" href="css/style.css">
    <title>Pricing Page</title>
  </head>

<body>

  <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark ">
    <div class="container">
      <a href="../index.php" class="navbar-brand ">INSIDE MATTERS</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a href="../index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item ">
            <a href="../about/about.php" class="nav-link">About Us</a>
          </li>
          <li class="nav-item">
            <a href="../journal.php" class="nav-link">Journal</a>
          </li>
          <li class="nav-item">
            <a href="../CMS/Blog.php?page=1" class="nav-link">Blog</a>
          </li>
          <li class="nav-item active">
            <a href="pricing1.php" class="nav-link">Yoga</a>

         <li class="nav-item">
            <a href="../Recepies/Recipe.php?page=1" class="nav-link">Recipes</a>
          </li>

          <li class="nav-item">
                <a href="../contact/Contact.php" class="nav-link">Contact Us</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- SHOWCASE SLIDER -->

     <section id="showcase">
     <div id="myCarousel" class="carousel slide" data-ride="carousel">
       <div class="carousel-inner">
         <div class="carousel-item carousel-image-1 active">
           <div class="container">
             <div class="carousel-caption d-none d-sm-block text-right text-white  mb-5 ">
               <h1 class="display-1">Yoga</h1>
               <p class="lead display-5">Yoga is important for your health, mind, body & soul.</p>
             </div>
           </div>
         </div>



       <!-- Start of SimpleTix Widget. Paste this in to your website where you want the widget to appear. Do no change the code or the widget may not work properly. -->
       <div style="width:100%; text-align:left;">
          <div id="simpletixEmbed">
              <script src="https://embeds.simpletix.com/Scripts/embediFrame.js" data-url="https://embed.prod.simpletix.com//b7ae5c7c-9336-411a-85b1-0b8db56811d2/60929?smtxorigin=9"></script>
          </div>
          <div style="font-family:Helvetica, Arial; font-size:12px; padding:10px 0 5px; margin:2px; width:100%; text-align:left;" >
              <a style="color: #ADB0B6; text-decoration: none;" target="_parent"
              href ='https://www.simpletix.com/?utm_source=embed&utm_medium=web&utm_campaign=embedwidget&utm_content=footer&a=logo'>Powered by SimpleTix</a>
          </div>
       </div>




<br>

<section id="home-heading" class="p-5">
<div class="dark-overlay">
  <div class="row">
    <div class="col">




    </div>
  </div>
</div>
</section>

<section id="info" class="py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-6 align-self-center">
        <h3>Parissa Dunkinson,RD,BSc (Hons)</h3>
          <p> Founder of Inside Matters and Freelance Mental Health Dietitian.<br><br> INSIDE MATTERS was started to release evidence based content out into the internet that is current, relevant and reliable. It aims to inspire a holistic health approach to eating and exercise.</p>
          <a href="about/about.php" class="btn btn-outline-danger btn-lg">Learn More</a>
        </div>
        <div class="col-md-6">
         <img src="img/Yogamindfulness.JPG" alt="right" class="img-fluid">
        </div>
      </div>
    </div>
</section>


<!-- VIDEO PLAY -->
<section id="video-play">
 <div class="dark-overlay">
   <div class="row">
     <div class="col">
       <div class="container p-5">
         <a href="#" class="video" data-video="https://www.youtube.com/embed/f6Cswdm601A" data-toggle="modal" data-target="#videoModal">
           <i class="fas fa-play fa-3x"></i>
         </a>
         <h1>Why yoga is so important for your health ?</h1>
       </div>
     </div>
   </div>
 </div>
</section>



 <!-- Photo Gallery -->

<section id="gallery" class="py-5">
 <div class="container">
   <h1 class="text-center">Photo Gallery</h1>
   <p class="text-center">Check out our photos</p>
   <div class="row mb-4">
     <div class="col-md-4">
       <a href="img/yoga3.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="560"
         data-width="560">
         <img src="img/yoga3.jpg" alt="" class="img-fluid">
       </a>
     </div>

     <div class="col-md-4">
       <a href="img/yoga5.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="561"
         data-width="561">
         <img src="img/yoga5.jpg" alt="" class="img-fluid">
       </a>
     </div>

     <div class="col-md-4">
       <a href="img/yoga.jpeg" data-toggle="lightbox" data-gallery="img-gallery" data-height="562"
         data-width="562">
         <img src="img/yoga.jpeg" alt="" class="img-fluid">
       </a>
     </div>
   </div>

   <div class="row mb-4">
     <div class="col-md-4">
       <a href="img/yoga10.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="563"
         data-width="563">
         <img src="img/yoga10.jpg" alt="" class="img-fluid">
       </a>
     </div>

     <div class="col-md-4">
       <a href="img/yoga8.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="564"
         data-width="564">
         <img src="img/yoga8.jpg" alt="" class="img-fluid">
       </a>
     </div>

     <div class="col-md-4">
       <a href="img/yoga9.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="565"
         data-width="565">
         <img src="img/yoga9.jpg" alt="" class="img-fluid">
       </a>
     </div>
   </div>
 </div>
</section>









<!-- VIDEO MODAL -->
<div class="modal fade" id="videoModal">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-body">
       <button class="close" data-dismiss="modal">
         <span>&times;</span>
       </button>
       <iframe src="" frameborder="0" height="350" width="100%" allowfullscreen></iframe>
     </div>
   </div>
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

<!-- Footer  Area End -->



<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

<script>
  // Get the current year for the copyright
  $('#year').text(new Date().getFullYear());


  // Lightbox Init
  $(document).on('click', '[data-toggle="lightbox"]', function (event) {
    event.preventDefault();
    $(this).ekkoLightbox();
  });

  // Video Play
  $(function () {
    // Auto play modal video
    $(".video").click(function () {
      var theModal = $(this).data("target"),
        videoSRC = $(this).attr("data-video"),
        videoSRCauto = videoSRC + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
      $(theModal + ' iframe').attr('src', videoSRCauto);
      $(theModal + ' button.close').click(function () {
        $(theModal + ' iframe').attr('src', videoSRC);
      });
    });
  });

</script>
</body>
</html>
