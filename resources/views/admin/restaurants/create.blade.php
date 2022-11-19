@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>CREA IL RISTORANTE</h1>

        <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="restaurant_address">Indirizzo</label>

                <input class="form-control" type="text" name="restaurant_address" id="restaurant_address"
                    value="{{ old('restaurant_address') }}">

                @error('restaurant_address')
                    <p class="valid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="p_iva">Partita iva</label>

                <input class="form-control" type="text" name="p_iva" id="p_iva" value="{{ old('p_iva') }}">

                @error('p_iva')
                    <p class="valid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="restaurant_description">Descrivi il tuo ristorante</label>

                <input class="form-control" type="text" name="restaurant_description" id="restaurant_description"
                    value="{{ old('restaurant_description') }}">

                @error('restaurant_description')
                    <p class="valid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="restaurant_phone_number">Numero di telefono</label>

                <input class="form-control" type="text" name="restaurant_phone_number" id="restaurant_phone_number"
                    value="{{ old('restaurant_phone_number') }}">

                @error('restaurant_phone_number')
                    <p class="valid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <p>Tipologie</p>
                @foreach ($typologies as $t)
                    <div class="d-inline-block mr-3">
                        <label class="btn btn-secondary" for="t-{{ $t->id }}">
                            <input type="checkbox" name="typologies[]" id="t-{{ $t->id }}"
                                @if (in_Array($t->id, old('typologies', []))) checked @endif value="{{ $t->id }}">
                            {{ $t->name }}
                        </label>
                    </div>
                @endforeach
            </div>


            <div class="form-group">
                <label for="restaurant_image" aria-describedby="inputGroupFileAddon02">
                    Scegli l'immagine del tuo Ristorante
                </label>

                <div>
                    <img id="blah" alt="your image" height="300" />
                </div>

                <input class="form-control-file btn btn-secondary" type="file" id="restaurant_image"
                    name="restaurant_image" value="{{ old('restaurant_image') }}"
                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                @error('restaurant_image')
                    <p class="valid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <input class="btn btn-primary" type="submit" value="Crea il tuo ristorante">

        </form>
    </div>
@endsection
