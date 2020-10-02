<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sales;

class Invoice extends Model
{   
    protected $table = 'invoice';
    protected $fillable = ['salesNo', 'itemName', 'quantity', 'price'];
    
    public function sales()
    {
        return $this->belongsTo('App\Models\Sales', 'salesNo', 'salesNo');
    }
}
