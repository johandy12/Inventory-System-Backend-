<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Job extends Model
{
    public $timestamps = false;
    protected $table = 'job';
    protected $fillable = ['job', 'privilege'];

    public function jobs(){
        return $this->hasMany("App\Users");
    }
}
