<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Type;
use App\Models\Brand;

class Stocks extends Model
{
    protected $table = 'stocks';
    protected $fillable = ['user_id', 'type_id', 'brand_id', 'itemName', 'picture', 'basePrice', 'sellPrice', 'quantity',
                           'quantityMinimum', 'size', 'description', 'purchaseLocation', 'itemLocation'];
    
    public function type(){
        return $this->hasOne("App\Models\Type");
    }

    public function brand(){
        return $this->hasOne("App\Models\Brand");
    }
}
