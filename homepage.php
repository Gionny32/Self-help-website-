<?php
$page_title = "User Authentication - Homepage";
include_once 'partials/headers.php';
?>


<!-- SHOWCASE SLIDER -->

  <section id="showcase">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item carousel-image-1 active">
        <div class="container">
          <div class="carousel-caption d-none d-sm-block text-right text-white  mb-5 ">
            <h1 class="display-3">Nourish your mind, body & soul</h1>
            <p class="lead">Nutrition is important for your health and well-being.</p>
            <!--<a href="Login/login.php" class="btn btn-danger btn-lg"></a>-->
          </div>
        </div>
      </div>

      <div class="carousel-item carousel-image-2">
        <div class="container pb-5">
          <div class="carousel-caption d-none d-sm-block text-white mb-5">
              <br>
            <h1 class="display-3">Nutritional 1:1 coaching sessions</h1>
            <p class="lead">We are the experts of our own bodies and we often know which goals we need to set. Having a nutritional professional to understand the emotions attached to those goals alongside expert scientific knowledge, enables us to make life long changes.</p>
            <a href="#" class="btn btn-primary btn-lg">Learn More</a>
          </div>
        </div>
      </div>

      <div class="carousel-item carousel-image-3">
        <div class="container">
          <div class="carousel-caption d-none d-sm-block text-right mb-5">
            <h1 class="display-3">Recipes</h1>
            <p class="lead">Nutritional recipes and ideas that are tasty and easy to follow.<br>Check out my page for some inspiration today.</p>
            <a href="#" class="btn btn-success btn-lg">Find Out More</a>
          </div>
        </div>
      </div>
    </div>

    <a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
      <span class="carousel-control-prev-icon"></span>
    </a>

    <a href="#myCarousel" data-slide="next" class="carousel-control-next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</section>

  <!-- Home Icone Section -->

  <section id="home-icons" class="py-5">
  <div class="container">
      <div class="row">
       <div class="col-md-4 mb-4 text-center">
          <i class="fas fa-cog fga-3x mb-2"></i>
          <h3>Dietetic Writing</h3>
          <p>Writing engaging articles and nutritional content for publishing on Nutrition and Wellness Platforms.<br>Nutritional content writing is available upon request.</p>
          </div>
       <div class="col-md-4 mb-4 text-center">
          <i class="fas fa-cloud fga-3x mb-2"></i>
          <h3> Evidence </h3>
          <p>This space has been created with evidence based information that is current, relevant and based on expert opinion.</p>
          </div>
       <div class="col-md-4 mb-4 text-center">
          <i class="fas fa-thumbs-up fga-3x mb-2"></i>
          <h3>Trust a Dietitian to know about Nutrition </h3>
          <p>With the rise of the nutrition and wellness blogger, it is important for us all to display our credentials so you can be confident in the service you choose and the expertise you receive.</p>
          </div>
      </div>
      </div>
  </section>


  <!-- Home Heading Section -->

  <section id="home-heading" class="p-5">
  <div class="dark-overlay">
    <div class="row">
      <div class="col">
        <div class="container pt-5">
          <h1></h1>
          <h1 class="d-none d-md-block">Now it’s your turn to get more joy in your life.</h1>
          <!-- <a href="#" class="btn btn-danger btn-md">Get Started</a> -->
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Info Section -->

  <section id="info" class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-6 align-self-center">
          <h3>Parissa Dunkinson,RD,BSc (Hons)</h3>
            <p> Founder of Inside Matters and Freelance Mental Health Dietitian.<br><br> INSIDE MATTERS was started to release evidence based content out into the internet that is current, relevant and reliable. It aims to inspire a holistic health approach to eating and exercise.</p>
            <a href="#" class="btn btn-outline-danger btn-lg">Learn More</a>
          </div>
          <div class="col-md-6">
           <img src="img/parissa1.jpg" alt="right" class="img-fluid">
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
          <h1>See What We Do</h1>
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
        <a href="img/recipes.jpeg" data-toggle="lightbox" data-gallery="img-gallery" data-height="560"
          data-width="560">
          <img src="img/recipes.jpeg" alt="" class="img-fluid">
        </a>
      </div>

      <div class="col-md-4">
        <a href="img/image6.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="561"
          data-width="561">
          <img src="img/image6.jpg" alt="" class="img-fluid">
        </a>
      </div>

      <div class="col-md-4">
        <a href="img/image7.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="562"
          data-width="562">
          <img src="img/image7.jpg" alt="" class="img-fluid">
        </a>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-md-4">
        <a href="img/image8.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="563"
          data-width="563">
          <img src="img/image8.jpg" alt="" class="img-fluid">
        </a>
      </div>

      <div class="col-md-4">
        <a href="img/image3.jpeg" data-toggle="lightbox" data-gallery="img-gallery" data-height="564"
          data-width="564">
          <img src="img/image3.jpeg" alt="" class="img-fluid">
        </a>
      </div>

      <div class="col-md-4">
        <a href="img/image10.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="565"
          data-width="565">
          <img src="img/image10.jpg" alt="" class="img-fluid">
        </a>
      </div>
    </div>
  </div>
</section>



 <!-- Newsletter-->
  <section id="newsletter" class="text-center p-5 bg-dark text-white">
  <div class="container">
      <div class="row">

      </div>
      </div>
  </section>

<!-- FOOTER -->

<?php  include_once 'partials/footers.php'; ?>



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




</body>

</html>
