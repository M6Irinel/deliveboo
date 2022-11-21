@extends('layouts.app')

@section('content')
@if (!$include)
non è roba tua
    
@endif
    <div class="container">

        <h1 class="text-primary">{{ strtoupper($name) }}</h1>

        @if ($restaurants->all())
            <ul style="list-style: none; padding: 0;">
                @foreach ($restaurants as $restaurant)
                    <li>
                        @if ($restaurant->restaurant_image)
                            <div class="my-3">
                                <img height="300" src="{{ asset('storage/' . $restaurant->restaurant_image) }}"
                                    alt="NON HAI MESSO UNA IMMAGINE DEL RISTORANTE!">
                            </div>
                        @else
                            <h3 class="text-danger">NON HAI VOLUTO INSERIRE UNA IMMAGINE DEL RISTORANTE!?</h3>
                        @endif

                        <p>Indirizzo : <strong>{{ $restaurant->restaurant_address }}</strong></p>
                        <p>Descrizione : <strong>{{ $restaurant->restaurant_description }}</strong></p>
                        <p>Numero di telefono : <strong>+39 {{ $restaurant->restaurant_phone_number }}</strong></p>

                        <div class="d-flex justify-content-center">
                            <div class="mt-3 mx-3">
                                <a class="btn btn-success d-block button"
                                    href="{{ route('admin.restaurants.show', $restaurant) }}">VAI
                                    AL SHOW DEL RISTORANTE</a>
                            </div>

                            <div class="mt-3 mx-3">
                                <a class="btn btn-primary d-block button" href="{{ route('admin.plates.index') }}">VAI AL
                                    INDEX DEI
                                    PIATTI</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="mt-2">
                <a class="btn btn-primary d-block" href="{{ route('admin.restaurants.create') }}">
                    DEVI ANCORA CREARE IL TUO RISTORANTE
                </a>
            </div>
        @endif
    </div>
@endsection
