<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Domen extends Model
{
    /*
    function __construct ($name, $domenDate, $hostDate, $comment, $domenPrice, $hostPrice) {
    	$this->name = $name;
    	$this->domenDate = $domenDate;
    	$this->hostDate = $hostDate;
    	$this->comment = $comment;
    	$this->domenPrice = $domenPrice;
    	$this->hostPrice = $hostPrice;
    }
    */
    protected $fillable = ['name', 'domenDate', 'hostDate', 'comment', 'domenPrice', 'hostPrice'];
    
    public function checkDomenDate() {
        
        if($this->domenDate < Carbon::today()->addMonth()){
            return True;
        }
        return False;
    }
    public function checkHostDate() {
        
        if($this->hostDate < Carbon::today()->addMonth()){
            return True;
        }
        return False;
    }
}
