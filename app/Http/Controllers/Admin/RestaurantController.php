<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Typology;
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
        $restaurants = Restaurant::where('user_id', auth()->user()->id)->get();
        $name = auth()->user()->name;

        return view('admin.restaurants.index', compact('restaurants', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typologies = Typology::orderBy('name', 'asc')->get();

        return view('admin.restaurants.create', compact('typologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'restaurant_address' => 'required|min:3|max:255',
            'p_iva' => 'required|size:13',
            'restaurant_description' => 'required',
            'restaurant_phone_number' => 'required|min:10|max:15',
            'typologies.*' => 'exists:typologies,id',
        ]);

        $typologies = $params['typologies'];

        // $params['user_id'] = Restaurant::orderBy('id', 'desc')->get()->all()[0]->id + 1;
        $params['user_id'] = ++Restaurant::orderBy('id', 'desc')->get()->all()[0]->id;

        $restaurant = Restaurant::create($params);

        $restaurant->typologies()->sync($typologies);

        return redirect()->route('admin.restaurants.show', $restaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
