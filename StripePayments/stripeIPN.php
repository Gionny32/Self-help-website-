

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

			<script src="lib/sweet-alert.min.js"></script>
			<link rel="stylesheet" type="text/css" href="lib/sweet-alert.css">

			<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.1.0/dist/sweetalert2.all.min.js"></script>
			<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
			<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

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


            <li class="nav-item">
                <a href="login-system/includes/logout.php" class="nav-link">Logout</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>



	<div class="container">

	<?php
		require_once "config.php";

		\Stripe\Stripe::setVerifySslCerts(false);

		// Token is created using Checkout or Elements!
		// Get the payment token ID submitted by the form:
		$productID = $_GET['id'];

		if (!isset($_POST['stripeToken']) || !isset($products[$productID])) {
			header("Location: pricing.php");
			exit();
		}

		$token = $_POST['stripeToken'];
		$email = $_POST["stripeEmail"];

		// Charge the user's card:
		$charge = \Stripe\Charge::create(array(
			"amount" => $products[$productID]["price"],
			"currency" => "usd",
			"description" => $products[$productID]["title"],
			"source" => $token,
		));


	//header('Location: pricing1.php');
		//send an email
		//store information to the database

		//echo 'Success! You have been charged $' . ($products[$productID]["price"]/100);

	if(isset($charge)) echo  $welcome = "<script type=\"text/javascript\">


		let timerInterval
		Swal.fire({
		title: 'Success! You have been charged for your $attributes $productID',
		html: 'You are being redirect to the Yoga page',
		timer: 6000,
		icon: 'success',
		timerProgressBar: true,
		onBeforeOpen: () => {
		Swal.showLoading()
		timerInterval = setInterval(() => {
		const content = Swal.getContent()
		if (content) {
		const b = content.querySelector('b')
		if (b) {
		b.textContent = Swal.getTimerLeft()
		}
		}
		}, 1000)
		},
		onClose: () => {
		clearInterval(timerInterval)

		}
		}).then((result) => {
		/* Read more about handling dismissals below */

		if (result.dismiss === Swal.DismissReason.timer) {

		console.log('I was closed by the timer')

		window.location.href= 'pricing1.php';

		}
		})

			</script>";

	?>


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

	</script>
	</body>
	</html>
