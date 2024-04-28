<?php 
	define('BASE_URL', 'http://172.30.0.2');
	define('STRIPE_SECRET_KEY','sk_test_51MnZSXSJ4QxhdhDrUB3QLGviEbKrfQXbbvSbCpgv00WtgzZikhsO0aPXjsq26SnJMlYgHVa9j5GybxEenAzpnb3000F89X0mDD');
	define('AMOUNT', 100);
	require './vendor/autoload.php';
	include './StripeTransactionLink.php';

	$generator = new StripeTransactionLink(STRIPE_SECRET_KEY);


	$productName = 'Nissan GTR';
	$amount =AMOUNT*100; //  usd
	$currency = 'inr';
	$successUrl = BASE_URL.'/stripe-success.php';
	$cancelUrl = BASE_URL.'/stripe-cancel.php';
	$paymentLink = $generator->generatePaymentLink($productName, $amount, $currency, $successUrl, $cancelUrl);

		
	



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Stripe Payment with raw php</title>
</head>
<body>
	<table>
		<tr>
			<th>Product name</th>
			<td>Test product</td>
		</tr>
		<tr>
			<th>Price</th>
			<td>100.00$</td>
		</tr>
		<tr>
			<th></th>
			<td><a href="<?php echo $paymentLink['url']; ?>">Pay With Stripe</a></td>
		</tr>
	</table>
</body>
</html>