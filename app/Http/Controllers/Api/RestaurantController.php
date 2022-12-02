<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\User;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::with('typologies', 'user')->paginate(6);
        $status = true;

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


            if ($plates) {
                return response()->json([
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


            if ($plates) {
                return response()->json([
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
