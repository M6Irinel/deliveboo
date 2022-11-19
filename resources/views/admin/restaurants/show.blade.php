@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>SHOW DEL RISTORANTE</h1>

        <p>Partita Iva : <strong>{{ $restaurant->p_iva }}</strong></p>
        <p>Indirizzo : <strong>{{ $restaurant->restaurant_address }}</strong></p>
        <img src="{{ asset('storage/' . $restaurant->restaurant_image) }} " height="300" alt="Nessuna Foto Del Ristorante">

        <div style="margin-top: 15px;">
            <ul>
                <strong>Tipologie:</strong>
                @forelse ($restaurant->typologies as $t)
                    <li> {{ $t->name }}</li>
                @empty
                    <li>nessuno</li>
                @endforelse
            </ul>

            <div class="d-flex justify-content-center">
                <div class="mt-2 mx-3">
                    <a class="btn btn-primary d-block button" href="{{ route('admin.restaurants.index') }}">VAI AL INDEX DEL
                        RISTORANTE</a>
                </div>

                <div class="mt-2 mx-3">
                    <a class="btn btn-success d-block button" href="{{ route('admin.plates.index') }}">VAI AL INDEX DEI PIATTI</a>
                </div>

                <div class="mt-2 mx-3">
                    <a class="btn btn-warning d-block button" href="{{ route('admin.plates.create') }}">CREA UN PIATTO</a>
                </div>

                <div class="mt-2 mx-3">
                    <a class="btn btn-secondary d-block button" href="{{ route('admin.home') }}">VAI ALLA HOME</a>
                </div>
            </div>
        </div>


    </div>
@endsection
