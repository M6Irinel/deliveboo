<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function plates()
    {
        return $this->hasMany('App\Plate');
    }

    public function typologies()
    {
        return $this->belongsToMany('App\Typology');
    }

    protected $fillable = [
        'restaurant_address',
        'p_iva',
        'restaurant_description',
        'restaurant_phone_number',
        'user_id',
        'restaurant_image',
        'restaurant_website'
    ];

    public function validateStore($request)
    {
        return $request->validate([
            'restaurant_address' => 'required|min:3|max:255',
            'p_iva' => 'required|size:13|unique:restaurants',
            'restaurant_description' => 'required',
            'restaurant_phone_number' => 'required|min:10|max:15|unique:restaurants',
            'typologies' => 'required|exists:typologies,id',
            'restaurant_image' => 'nullable|image|max:2048',
            'restaurant_website'=>'nullable|max:255'
        ]);
    }
}
