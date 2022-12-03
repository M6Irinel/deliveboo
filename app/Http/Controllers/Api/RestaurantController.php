<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Typology;
use App\User;
use Illuminate\Http\Request;
use Mockery\Undefined;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($value)
    {
        $status = true;
       

        if ($value == 'all') {
            $restaurants = Restaurant::with('typologies', 'user')->paginate(6);
            return response()->json(compact('restaurants', 'status'));
        }

        $restaurants = Typology::where('name', $value)->first()->restaurants()->with('typologies', 'user')->paginate(6);
        return response()->json(compact('restaurants', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (is_numeric($slug)) {
            $plates = User::where('id', $slug)->first()->restaurant->plates;
            $user = User::where('id', $slug)->with('restaurant')->first();


            if ($plates) {
                return response()->json([
                    'user' => $user,
                    'plates' => $plates,
                    'status' => true
                ]);
            } else {
                return response()->json([
                    'status' => false
                ], 404);
            }
        } else {
            $plates = User::where('slug', $slug)->first()->restaurant->plates;
            $user = User::where('slug', $slug)->with('restaurant')->first();


            if ($plates) {
                return response()->json([
                    'user' => $user,
                    'plates' => $plates,
                    'status' => true
                ]);
            } else {
                return response()->json([
                    'status' => false
                ], 404);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
