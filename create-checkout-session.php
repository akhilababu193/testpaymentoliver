<?php

include './stripe-php/init.php';
//require 'vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51L5V5OJU9xhnYdCOB95v3grszt2k7hpqUILS67s5BaVyddwGsIED0eg7F048k1FwofmOGfVBEwOb0u836dGWyC2n00vZypsgIO');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/stripe/public';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    #'price' => '{{PRICE_ID}}',
    'price' => 'price_1L5WXUJU9xhnYdCOFcuAetd1',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);