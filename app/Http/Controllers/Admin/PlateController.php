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
        $plates = Plate::where('restaurant_id', auth()->user()->id)->get();

        return view('admin.plates.index', compact('plates'));
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
    public function store(Request $request)
    {
        
        $params = $request->validate([
            'plate_name' => 'required|max:255',
            'ingredients' => 'required',
            'plate_description' => 'nullable',
            'plate_price' => 'numeric|between:0,999.99',
            'visibility' => 'nullable|min:0|max:1',
            'plate_image' => 'nullable|max:255',
        ]);

        $params['restaurant_id'] = Restaurant::where('user_id', auth()->user()->id)->get()->all()[0]->id;


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
        return view('admin.plates.edit', compact('plate'));
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
        $params = $request->validate([
            'plate_name' => 'required|max:255',
            'ingredients' => 'required',
            'plate_description' => 'nullable',
            'plate_price' => 'numeric|between:0,999.99',
            'visibility' => 'nullable|min:0|max:1',
            'plate_image' => 'nullable|max:255'
        ]);

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
        // BASTA SCOMENTARE PER IL DELETE
        // $img = $plate->plate_image;

        // $plate->delete();

        // if ($img && Storage::exists($img)) {
        //     Storage::delete($img);
        // }

        // return redirect()->route('admin.plates.index');
    }
}
