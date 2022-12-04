@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-center">
            <a class="my-2 mx-3 btn btn-secondary" href="{{ route('admin.plates.index') }}">LISTA PIATTI</a>

            <a class="my-2 mx-3 btn btn-success" href="{{ route('admin.plates.show', $plate) }}">PROFILO PIATTO</a>
        </div>

        <h3 class="t-center"><strong>MODIFICA PIATTO</strong></h3>

        <form action="{{ route('admin.plates.update', $plate) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="plate_name">Nome del Piatto <strong>*</strong></label>

                <input class="form-control" type="text" name="plate_name" id="plate_name"
                    value="{{ old('plate_name', $plate->plate_name) }}">

                @error('plate_name')
                    <p class="invalid-feedback error__mess">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="ingredients">Ingredienti <strong>*</strong></label>

                <input class="form-control" type="text" name="ingredients" id="ingredients"
                    value="{{ old('ingredients', $plate->ingredients) }}">

                @error('ingredients')
                    <p class="invalid-feedback error__mess">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="plate_description">Descivi il tuo piatto</label>

                <textarea class="form-control" name="plate_description" id="plate_description" rows="3" cols="30">{{ old('plate_description', $plate->plate_description) }}</textarea>

                @error('plate_description')
                    <p class="invalid-feedback error__mess">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="plate_price">Prezzo <strong>*</strong></label>

                <input class="form-control" type="text" name="plate_price" id="plate_price"
                    value="{{ old('plate_price', $plate->plate_price) }}">

                @error('plate_price')
                    <p class="invalid-feedback error__mess">{{ $message }}</p>
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
                    <p class="invalid-feedback error__mess">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="plate_image" aria-describedby="inputGroupFileAddon02">
                    Scegli l'immagine del piatto
                </label>

                <div>
                    <img id="blah" alt="" height="250"
                        src="{{ asset('storage/' . $plate->plate_image) }} " />
                </div>

                <input class="form-control-file" type="file" id="plate_image" name="plate_image"
                    value="{{ old('plate_image', $plate->plate_image) }}"
                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                @error('plate_image')
                    <p class="invalid-feedback error__mess">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex justify-content-center">
                <input class="btn btn-primary" type="submit" value="Modifica il tuo piatto">
            </div>

        </form>
    </div>
@endsection
