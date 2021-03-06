<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    protected $table = 'purchaseInvoice';
    protected $fillable = ['salesNo', 'itemName', 'quantity', 'price'];
    
    public function purchases()
    {
        return $this->belongsto('App\Models\Purchases', 'salesNo', 'salesNo');
    }
}
