<?php

class StripeTransactionLink {
    private $secretKey;

    public function __construct($secretKey) {
        \Stripe\Stripe::setApiKey($secretKey);
        $this->secretKey = $secretKey;
    }
    public function getTransactionDetails($sessionId) {
        try {
            // Retrieve the session
            $session = \Stripe\Checkout\Session::retrieve($sessionId);

            // Retrieve the payment intent
            $paymentIntent = \Stripe\PaymentIntent::retrieve($session->payment_intent);

            // Access payment details
            $paymentStatus = $paymentIntent->status;
            $paymentMethod = $paymentIntent->payment_method;

            // You can retrieve more details as needed and return them
            return [
                'paymentStatus' => $paymentStatus,
                'paymentMethod' => $paymentMethod,
                // Add more fields as needed
            ];
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Handle the exception (e.g., log it or return an error response)
            return [
                'error' => $e->getMessage(),
            ];
        }
    }

    
    public function generatePaymentLink($productName, $amount, $currency, $successUrl, $cancelUrl) {
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => $currency,
                    'product_data' => [
                        'name' => $productName,
                    ],
                    'unit_amount' => $amount,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $successUrl,
            'cancel_url' => $cancelUrl,
        ]);
        if(isset($session->url) && $session->url){
            return [
                "url"=>$session->url,
                "stripeTnxId"=>$session->id
            ];
        }else{
            //error
            echo "Payment  Failed!";
        }
        
    }
}


