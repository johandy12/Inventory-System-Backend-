<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PurchaseInvoice;

class Purchases extends Model
{
    protected $table = 'purchases';
    protected $fillable = ['salesNo', 'sellerName', 'paymentType', 'totalPrice', 'tax', 'shipment',
                           'description', 'transactionDate', 'status'];
                           
    public function purchaseinvoice()
    {
        return $this->hasMany('App\Models\PurchaseInvoice', 'salesNo', 'salesNo');
    }
}
