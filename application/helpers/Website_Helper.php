<?php

/**
 * Description of Website_module
 *
 * @author jhovarie.guiang
 */
function include_bootstrap4() {
    echo '<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="public/libs/uiframework/bootstrap4/css/bootstrap.min.css">
  <script src="public/libs/uiframework/bootstrap4/jquery.min.js"></script>
  <script src="public/libs/uiframework/bootstrap4/popper.min.js"></script>
  <script src="public/libs/uiframework/bootstrap4/js/bootstrap.min.js"></script>';
}

function include_paypal() {
    include 'public/libs/ecommerce/PayPal-PHP-SDK/autoload.php';
}

function include_stripe() {
    include 'public/libs/ecommerce/stripe-php-6.23.0/init.php';
}

function include_passkey() {
    include 'public/setup/passkey.php';
}
