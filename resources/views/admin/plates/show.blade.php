@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <a class="btn btn-secondary d-block button" href="{{ route('admin.plates.index') }}">
                    <strong>←</strong> VAI AL PIATTI
                </a>
            </div>

            <div class="d-flex">
                <div class="mx-3">
                    <a class="btn btn-secondary d-block button" href="{{ route('admin.plates.edit', $plate) }}">
                        MODIFICA
                    </a>
                </div>

                <div>
                    <button class="btn btn-danger" id="openModal">Elimina</button>
                </div>
            </div>
        </div>

        <h1>SHOW DEL PIATTO</h1>

        <img src="{{ asset('./img/default/plate-empty.png') }} " height="250" alt="">

        <p>Nome piatto : <strong>{{ $plate->plate_name }}</strong></p>
        <p>descrizione : <strong>{{ $plate->plate_description }}</strong></p>
        <p>Prezzo : <strong>{{ $plate->plate_price }} €</strong></p>
        <p>Ingredienti : <strong>{{ $plate->ingredients }}</strong></p>

    </div>

    <div id="modal">
        <div class="body-modal">
            <p>Vuoi cancelare il piatto?</p>
            <div>
                <form action="{{ route('admin.plates.destroy', $plate) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input class="btn btn-danger" type="submit" value="SI">
                </form>

                <button class="btn btn-success" id="closeModal">No</button>
            </div>
        </div>
    </div>
@endsection
