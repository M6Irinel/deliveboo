@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>SHOW DEL RISTORANTE</h1>

        @if ($restaurant->restaurant_image)
            <div class="my-3">
                <img height="300" src="{{ asset('storage/' . $restaurant->restaurant_image) }}"
                    alt="NON HAI MESSO UNA IMMAGINE DEL RISTORANTE!">
            </div>
        @else
            <h3 class="text-danger">NON HAI VOLUTO INSERIRE UNA IMMAGINE DEL RISTORANTE!?</h3>
        @endif

        <p>Partita Iva : <strong>{{ $restaurant->p_iva }}</strong></p>
        <p>Indirizzo : <strong>{{ $restaurant->restaurant_address }}</strong></p>
        <p>Descrizione : <strong>{{ $restaurant->restaurant_description }}</strong></p>
        <p>Numero di telefono : <strong>+39 {{ $restaurant->restaurant_phone_number }}</strong></p>

        @if ($restaurant->restaurant_website)
            <p>Sito Web : <a href="#">{{ $restaurant->restaurant_website }}</a></p>
        @else
            <p>Sito Web : <strong>---</strong></p>
        @endif

        <div style="margin-top: 15px;">
            <ul class="list-n">
                <p class="m-0">Tipologie:</p>
                @forelse ($restaurant->typologies as $t)
                    <li class="list-item-n"> {{ $t->name }}</li>
                @empty
                    <li>nessuno</li>
                @endforelse
            </ul>

            <div class="d-flex justify-content-center">
                <div class="mt-2 mx-3">
                    <a class="btn btn-success d-block button" href="{{ route('admin.restaurants.index') }}">VAI AL INDEX DEL
                        RISTORANTE</a>
                </div>

                <div class="mt-2 mx-3">
                    <a class="btn btn-primary d-block button" href="{{ route('admin.plates.index') }}">VAI AL INDEX DEI
                        PIATTI</a>
                </div>

                <div class="mt-2 mx-3">
                    <a class="btn btn-warning d-block button" href="{{ route('admin.plates.create') }}">CREA UN PIATTO</a>
                </div>
            </div>
        </div>


    </div>
@endsection
