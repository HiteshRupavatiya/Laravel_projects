<?php

use App\PaymentService\PaymentServiceInterface;
use Illuminate\Support\Facades\Facade;

    class PaymentFacade extends Facade{
        public static function getFacadeAccessor() : string
        {
            return PaymentServiceInterface::class;
        }
    }

?>
