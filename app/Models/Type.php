<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Stocks;
use App\Models\Invoice;

class Type extends Model
{
    public $timestamps = false;
    protected $table = 'type';
    protected $fillable = ['type'];

    public function Items(){
        return $this->hasMany("App\Models\Stocks");
    }
    
    // public function Invoice(){
        // return $this->hasMany("App\Models\Invoice");
    // }
    
    // public function PurchaseInvoice(){
        // return $this->hasMany("App\Models\PurchaseInvoice");
    // }
}
