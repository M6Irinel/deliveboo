@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="my-2">
            <a class="btn btn-secondary" href="{{ route('admin.plates.show', $plate) }}">TORNA ALLO SHOW DEL PIATTO</a>
        </div>

        <h1>MODIFICA IL PIATTO</h1>

        <form action="{{ route('admin.plates.update', $plate) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="plate_name">Nome del Piatto</label>

                <input class="form-control" type="text" name="plate_name" id="plate_name"
                    value="{{ old('plate_name', $plate->plate_name) }}">

                @error('plate_name')
                    <p class="valid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="ingredients">Ingredienti</label>

                <input class="form-control" type="text" name="ingredients" id="ingredients"
                    value="{{ old('ingredients', $plate->ingredients) }}">

                @error('ingredients')
                    <p class="valid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="plate_description">descivi il tuo</label>

                <input class="form-control" type="text" name="plate_description" id="plate_description"
                    value="{{ old('plate_description', $plate->plate_description) }}">

                @error('plate_description')
                    <p class="valid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="plate_price">Prezzo</label>

                <input class="form-control" type="text" name="plate_price" id="plate_price"
                    value="{{ old('plate_price', $plate->plate_price) }}">

                @error('plate_price')
                    <p class="valid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="visibility">Visibilità</label>

                <select class="form-control" name="visibility" id="visibility">
                    <option value="">--Scegli la disponibilità del piatto--</option>
                    <option @if (old('visibility', $plate->visibility) == 1) selected @endif value="1">Visibile</option>
                    <option @if (old('visibility', $plate->visibility) == 0) selected @endif value="0">Nascosto</option>
                </select>

                @error('visibility')
                    <p class="valid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="plate_image" aria-describedby="inputGroupFileAddon02">
                    Scegli l'immagine del piatto
                </label>

                <div>
                    <img id="blah" alt="your image" height="250"
                        src="{{ asset('storage/' . $plate->plate_image) }} " />
                </div>

                <input class="form-control-file" type="file" id="plate_image" name="plate_image"
                    value="{{ old('plate_image', $plate->plate_image) }}"
                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                @error('plate_image')
                    <p class="valid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <input class="btn btn-primary" type="submit" value="Modifica il tuo piatto">

        </form>
    </div>
@endsection
