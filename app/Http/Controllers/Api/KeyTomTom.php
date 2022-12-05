<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeyTomTom extends Controller
{
    public function keyTomTom(){
        return response()->json(['keyTomTom' => env('KEY_TOMTOM')]);
    }
}
