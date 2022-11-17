@extends('layouts.app')

@section('content')
    <h1>CREATE</h1>

    <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="restaurant_address">Indirizzo</label>
            <input type="text" name="restaurant_address" id="restaurant_address" value="{{ old('restaurant_address') }}">
            @error('restaurant_address')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="p_iva">Partita iva</label>
            <input type="text" name="p_iva" id="p_iva" value="{{ old('p_iva') }}">
            @error('p_iva')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="restaurant_description">descivi il tuo</label>
            <input type="text" name="restaurant_description" id="restaurant_description"
                value="{{ old('restaurant_description') }}">
            @error('restaurant_description')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="restaurant_phone_number">numero</label>
            <input type="text" name="restaurant_phone_number" id="restaurant_phone_number"
                value="{{ old('restaurant_phone_number') }}">
            @error('restaurant_phone_number')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <input type="submit" value="Crea il tuo ristorante">
    </form>
@endsection
