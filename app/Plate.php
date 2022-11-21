<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $fillable = ['plate_name', 'ingredients', 'plate_description', 'plate_price', 'visibility', 'plate_image', 'restaurant_id'];

    // public $include = '';
    public function getIncludeAttribute($i){
        return $i;
    }
    public function setInclude($i){
        $this->include = $i;
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    public function validateStore($request)
    {
        return $request->validate([
            'plate_name' => 'required|max:255',
            'ingredients' => 'required',
            'plate_description' => 'nullable',
            'plate_price' => 'numeric|between:0,999.99',
            'visibility' => 'nullable|min:0|max:1',
            'plate_image' => 'nullable|image|max:2048',
        ]);
    }

    public function validateUpdate($request)
    {
        return $request->validate([
            'plate_name' => 'required|max:255',
            'ingredients' => 'required',
            'plate_description' => 'nullable',
            'plate_price' => 'numeric|between:0,999.99',
            'visibility' => 'nullable|min:0|max:1',
            'plate_image' => 'nullable|image|max:2048'
        ]);
    }
}
