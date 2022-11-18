<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $fillable = ['plate_name', 'ingredients', 'plate_description', 'plate_price', 'visibility', 'plate_image'];

    public function restaurant(){
        return $this->belongsTo('App\Restaurant');
    }
}
