<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Stocks;
use App\Models\Invoice;

class Brand extends Model
{
    public $timestamps = false;
    protected $table = 'brand';
    protected $fillable = ['brand'];

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
