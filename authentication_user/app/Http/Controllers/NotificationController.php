<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OfferNotification;

class NotificationController extends Controller
{
    public function sendNotification()
    {
        $user = User::first();

        $offerData = [
            'name' => 'Abc',
            'body' => 'You received an offer',
            'thanks' => 'Thank you',
            'offerText' => 'check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => rand(1111, 9999),
            'Thanks' => 'Thank you',
        ];

        Notification::send($user, new OfferNotification($offerData));
        dd('Task is completed');
    }
}
