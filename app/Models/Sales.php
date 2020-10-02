<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Invoice;

class Sales extends Model
{
    protected $table = 'sales';
    protected $fillable = ['seller_id', 'salesNo', 'customerName', 'paymentType', 'totalPrice', 'tax', 'shipment',
                           'description', 'transactionDate', 'status'];
    
    public function seller(){
        return $this->hasOne("App\User", "seller_id");
    }
    
    public function invoice()
    {
        return $this->hasMany('App\Models\Invoice', 'salesNo', 'salesNo');
    }
}
