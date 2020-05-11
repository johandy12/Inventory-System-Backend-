<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $table = 'purchases';
    protected $fillable = ['salesNo', 'sellerName', 'paymentType', 'totalPrice', 'tax', 'shipment',
                           'description', 'transactionDate', 'status'];
}
