<?php

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51PLrJDJUFvwMLDfdkUDDdEEp2b05TzOXg9o2qGhYhmLXvKLrZdLqBapBrR2BTZwvHJjUGqLc0vEL5OpIoPfmVFn300rB5D93E3";

\Stripe\Stripe::setApiKey($stripe_secret_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://127.0.0.1:59623/success.php",
    "cancel_url" => "http://127.0.0.1:59623/booking.php",
    "locale" => "auto",
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "usd",
                "unit_amount" => 50000,
                "product_data" => [
                    "name" => "Deposit"
                ]
            ]
        ],
        [
            "quantity" => 2,
            "price_data" => [
                "currency" => "usd",
                "unit_amount" => 700,
                "product_data" => [
                    "name" => "Deposit Fee"
                ]
            ]
        ]        
    ]
]);

http_response_code(303);
header("Location: " . $checkout_session->url);