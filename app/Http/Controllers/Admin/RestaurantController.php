<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ConfermaRegistrazione;
use App\Restaurant;
use App\Plate;
use App\Typology;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
        // dd(auth()->user()->id);

        return view('admin.restaurants.index', compact('restaurants', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exist = Restaurant::where('id', auth()->user()->id)->get()->all();

        if ($exist == []) {
            $typologies = Typology::orderBy('name', 'asc')->get();


            return view('admin.restaurants.create', compact('typologies'));
        } else {
            return redirect()->route('admin.restaurants.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Restaurant $restaurant)
    {
        $params = $restaurant->validateStore($request);

        $params['user_id'] = ++Restaurant::orderBy('user_id', 'desc')->get()->all()[0]->id;

        if (array_key_exists('restaurant_image', $params)) {
            $params['restaurant_image'] = Storage::put('restaurant_img',  $params['restaurant_image']);
        }

        $restaurant = Restaurant::create($params);

        $restaurant->typologies()->sync($params['typologies']);

        $userMail = User::where('id', $params['user_id'])->first()->email;
        $userName = User::where('id', $params['user_id'])->first()->name;
        Mail::to($userMail)->send(new ConfermaRegistrazione($userName));

        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
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
