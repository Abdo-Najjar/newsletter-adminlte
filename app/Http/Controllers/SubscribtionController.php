<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;
use App\User;
use Illuminate\Http\Response;

class SubscribtionController extends Controller
{

    public function subscribe(Newsletter $newsletter)
    {


            auth()->user()->subscription($newsletter->id, User::SUBSCRIBE);


            return response()->json(['message'=>'abonnement effectué avec succée']);
    }

    public function unsubscribe(Newsletter $newsletter)
    {
            auth()->user()->subscription($newsletter->id, User::UNSUBSCRIBE);

            return response()->json(['message' => 'désabonnement effectué avec succée']);
    }
}
