<?php

    namespace App\PaymentService;

    class PayPalApi implements PaymentServiceInterface{

        public static function checkout() : string
        {
            return "You Checked Out With Paypal";
        }

    }

?>