<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Plate;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates = Plate::where('restaurant_id', auth()->user()->id)->orderBy('plate_name', 'asc')->get();
        $name = auth()->user()->name;

        return view('admin.plates.index', compact('plates', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Plate $plate)
    {
        $params = $plate->validateStore($request);

        $params['restaurant_id'] = Restaurant::where('user_id', auth()->user()->id)->get()->all()[0]->id;

        if (array_key_exists('plate_image', $params)) {
            $params['plate_image'] = Storage::put('plate_img',  $params['plate_image']);
        }

        $plate = Plate::create($params);

        return redirect()->route('admin.plates.show', $plate);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        return view('admin.plates.show', compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        $isYours = Restaurant::where('user_id', auth()->user()->id)->get()->all()[0]->plates->all();

        $include = in_array($plate, $isYours);

        if ($include) {
            return view('admin.plates.edit', compact('plate'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        $params = $plate->validateUpdate($request);

        if (array_key_exists('plate_image', $params)) {
            $params['plate_image'] = Storage::put('plate_img', $params['plate_image']);
        }

        $plate->update($params);

        return redirect()->route('admin.plates.show', $plate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        $img = $plate->plate_image;

        $plate->delete();

        if ($img && Storage::exists($img)) {
            Storage::delete($img);
        }

        return redirect()->route('admin.plates.index');
    }
}
