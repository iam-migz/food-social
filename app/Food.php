<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Seller;

class Food extends Model
{
    protected $table = 'foods';

    protected $guarded = [];

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

}
