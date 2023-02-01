<?php

use App\PaymentService\PaymentServiceInterface;

    class PayUApi implements PaymentServiceInterface{

        public static function checkout() : string {
            return "You Checked Out With Pay u Money";
        }
        
    }

?>