<?php
	require_once "stripe-php-master/init.php";
	require_once "products.php";

	$stripeDetails = array(
		"secretKey" => "sk_test_51HcErYECdPHdRa769tIcBeg5Ys8RhIfA4VtjOQHxIOkXcaxIItYUM8T6mm2cagc7ZA5vmctGXpJiKIsHxGspU3Ir00jh5cWjTZ",
		"publishableKey" => "pk_test_51HcErYECdPHdRa76GdWwGA88rYIFh0WDo8nxcGgYfT2ZvG21n4GNqYvcWUBUdbeSGd91v6bbSV9yfFkO96fSfElW00TjxOe7tF"
	);

	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey($stripeDetails['secretKey']);
?>
