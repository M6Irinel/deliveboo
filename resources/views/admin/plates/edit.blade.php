
@extends('layouts.app')

@section('content')
    <h1>MODIFICA IL PIATTO</h1>

    <form action="{{ route('admin.plates.update', $plate) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="plate_name">Nome del Piatto</label>
            <input type="text" name="plate_name" id="plate_name" value="{{ old('plate_name', $plate->plate_name) }}">
            @error('plate_name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="ingredients">Ingredienti</label>
            <input type="text" name="ingredients" id="ingredients" value="{{ old('ingredients', $plate->ingredients) }}">
            @error('ingredients')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="plate_description">descivi il tuo</label>
            <input type="text" name="plate_description" id="plate_description"
                value="{{ old('plate_description', $plate->plate_description) }}">
            @error('plate_description')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="plate_price">Prezzo</label>
            <input type="text" name="plate_price" id="plate_price"
                value="{{ old('plate_price', $plate->plate_price) }}">
            @error('plate_price')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="visibility">Visibilità</label>
            <select name="visibility" id="visibility" >
                <option value="">--Scegli la disponibilità del piatto--</option>
                <option @if(old('visibility', $plate->visibility) == 1) selected @endif value="1">Visibile</option>
                <option @if(old('visibility', $plate->visibility) == 0) selected @endif value="0">Nascosto</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="">
                <label for="plate_image" aria-describedby="inputGroupFileAddon02">Scegli
                    l'immagine del piatto</label>
                <input type="file"  id="plate_image" name="plate_image" value="{{ old('plate_image', $plate->plate_image) }}">
                {{-- <img id="blah"  /> `````ADAMO PRENDI CODICE ANTEPRIMA IMMAGINE``````--}}
            </div>
            

        </div>

        <input type="submit" value="Crea il tuo piatto">
    </form>
@endsection