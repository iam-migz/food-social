<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Food;
use App\Order;
class Seller extends Model
{
    
    public function foods(){
        return $this->hasMany(Food::class);
    }


}
