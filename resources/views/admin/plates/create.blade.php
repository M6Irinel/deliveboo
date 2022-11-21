@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="my-2 d-flex justify-content-center">
            <a class="btn btn-secondary" href="{{ route('admin.plates.index') }}">TORNA AL INDEX DEI PIATTI</a>
        </div>

        <h1>CREARE NUOVO PIATTO</h1>

        <form action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="plate_name">Nome del Piatto *</label>

                <input class="form-control" type="text" name="plate_name" id="plate_name" value="{{ old('plate_name') }}">

                @error('plate_name')
                    <p class="valid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="ingredients">Ingredienti strong <strong>*</strong></label>

                <input class="form-control" type="text" name="ingredients" id="ingredients"
                    value="{{ old('ingredients') }}">

                @error('ingredients')
                    <p class="valid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="plate_description">Descrivi il tuo piatto <strong>*</strong></label>

                <input class="form-control" type="text" name="plate_description" id="plate_description"
                    value="{{ old('plate_description') }}">

                @error('plate_description')
                    <p class="valid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="plate_price">Prezzo del piatto <strong>*</strong></label>

                <input class="form-control" type="text" name="plate_price" id="plate_price"
                    value="{{ old('plate_price') }}">

                @error('plate_price')
                    <p class="valid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="visibility">Visibilità del piatto <strong>*</strong></label>

                <select class="form-control" name="visibility" id="visibility">
                    <option value="">--Scegli la disponibilità del piatto--</option>
                    <option @if (old('visibility') == 1) selected @endif value="1">Visibile</option>
                    <option @if (old('visibility') == 0) selected @endif value="0">Nascosto</option>
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
                    <img id="blah" alt="your image" height="250" />
                </div>

                <input class="form-control-file btn btn-secondary" type="file" id="plate_image" name="plate_image"
                    value="{{ old('plate_image') }}"
                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                @error('plate_image')
                    <p class="valid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <div class="mt-2 d-flex justify-content-center">
                <input class="btn btn-primary" type="submit" value="Crea il tuo piatto">
            </div>

        </form>
    </div>
@endsection
