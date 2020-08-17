<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Domen;
use Carbon\Carbon;
use Symfony\Component\Process\Process;

class Telega extends Model
{
    public function loadMonitoring(){
        $process = new Process('uptime');
        $process->run();
        $upt = $process->getOutput();
        preg_match('/average: ([0-9]*[.][0-9]*),/', $upt, $load);
        $l = array_key_exists(1, $load);
        dd($l);
        if($l > '0.01'){
            Telegram::sendMessage([
            'chat_id' => env('CHAT_ID'),
            'text' => 'Обнаружена повышенная нагрузка на сервер: '.$upt
            ]);
        }
    }

    public function webhook($request){
        //$request["message"]["chat"]["id"]
        if($request['message']['text'] == 'отчет'){
            Telegram::sendMessage([
            'chat_id' => env('CHAT_ID'),
            'text' => 'Свежий отчет'
            ]);
        }else{
            Telegram::sendMessage([
            'chat_id' => env('CHAT_ID'),
            'text' => 'Неизвестный запрос'
            ]);
        }
        return 1;
    }
    public function freshStat($url){
        echo exec('zcat -f /var/www/igo3d/data/logs/igo3d.ru.access.log | goaccess -o /var/www/hostling/data/www/hostling.ru/stats/igo_6.10.html');
    }

    public function sandbox(){
        $this->loadMonitoring();
    }
    public function checkDomains(){
        $domen = new Domen;
        $domen->all();
        foreach($domen->all() as $dom){
            if($dom->domenDate < Carbon::today()->addWeeks(2)){
                Telegram::sendMessage([
                    'chat_id' => env('CHAT_ID'),
                    'text' => 'Домен '.$dom->name.' заканчивается '.$dom->domenDate.' Необходимо продление'
                ]);
            }
        }
    }
    public function checkHosting(){
        $domen = new Domen;
        $domen->all();
        foreach($domen->all() as $dom){
            if($dom->hostDate < Carbon::today()->addWeeks(2)){
                Telegram::sendMessage([
                    'chat_id' => env('CHAT_ID'),
                    'text' => 'Хостинг сайта '.$dom->name.' заканчивается '.$dom->hostDate.' Необходимо продление'
                ]);
            }
        }
    }
}
