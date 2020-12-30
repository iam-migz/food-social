<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Food;
class Seller extends Model
{
    
    public function foods(){
        return $this->hasMany(Food::class);
    }


}
