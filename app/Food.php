<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Seller;
use App\Order;

class Food extends Model
{
    protected $table = 'foods';

    protected $guarded = [];

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

}
