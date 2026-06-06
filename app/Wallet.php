<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $guarded = [];

    //foreign key ရှိရင် belongsTo 
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');//foreign key and primary key
    }
}
