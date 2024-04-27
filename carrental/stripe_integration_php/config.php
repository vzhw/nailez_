<?php 
 
// Product Details 
// Minimum amount is $0.50 US 
$itemName = "Demo Product"; 
$itemPrice = 25;  
$currency = "USD";  
 
/* Stripe API configuration 
 * Remember to switch to your live publishable and secret key in production! 
 * See your keys here: https://dashboard.stripe.com/account/apikeys 
 */ 
define('STRIPE_PUBLISHABLE_KEY', 'Insert_Stripe_API_Publishable_Key'); 
define('STRIPE_SECRET_KEY', 'Insert_Stripe_API_Secret_Key'); 
  
// Database configuration  
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', 'root');  
define('DB_NAME', 'codexworld_db'); 
 
?>