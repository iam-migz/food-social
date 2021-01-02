<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Food;
use App\Customer;

class Order extends Model
{
    protected $guarded = [];

    public function food(){
        return $this->belongsTo(Food::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    
}
