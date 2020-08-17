<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Telega;

class TelegramController extends Controller
{
    public function bot()
    {
    	$tel = new Telega;
    	$tel->sandbox();
    }
    public function botwh(Request $request){
        $tel = new Telega;
        $tel->webhook($request);
    }
}
