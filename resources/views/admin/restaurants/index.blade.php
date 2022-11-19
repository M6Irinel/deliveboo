@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-primary">DA {{ strtoupper($name) }}</h1>

        @if ($restaurants->all())
            <ul style="list-style: none; padding: 0;">
                @foreach ($restaurants as $restaurant)
                    <li>
                        <p>Partita Iva : <strong>{{ $restaurant->p_iva }}</strong></p>
                        <p>Indirizzo : <strong>{{ $restaurant->restaurant_address }}</strong></p>

                        <div class="d-flex justify-content-center">
                            <div class="mt-3 mx-3">
                                <a class="btn btn-success d-block button"
                                    href="{{ route('admin.restaurants.show', $restaurant) }}">VAI
                                    AL SHOW DEL RISTORANTE</a>
                            </div>

                            <div class="mt-3 mx-3">
                                <a class="btn btn-primary d-block button" href="{{ route('admin.plates.index') }}">VAI AL INDEX DEI
                                    PIATTI</a>
                            </div>

                            <div class="mt-3 mx-3">
                                <a class="btn btn-secondary d-block button" href="{{ route('admin.home') }}">VAI ALLA HOME</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="mt-2">
                <a class="btn btn-primary d-block" href="{{ route('admin.restaurants.create') }}">
                    CREA QUI IL TUO RISTORANTE
                </a>
            </div>
        @endif
    </div>
@endsection
