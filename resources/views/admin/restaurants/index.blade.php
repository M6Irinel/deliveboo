@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-primary">DA {{strtoupper($name)}}</h1>

        @if ($restaurants->all())
            <ul style="list-style: none; padding: 0;">
                @foreach ($restaurants as $restaurant)
                    <li>
                        <p>Partita Iva : <strong>{{ $restaurant->p_iva }}</strong></p>
                        <p>Indirizzo : <strong>{{ $restaurant->restaurant_address }}</strong></p>

                        <div style="margin-top: 15px;">
                            <a class="btn btn-success d-block" href="{{ route('admin.restaurants.show', $restaurant) }}">VAI
                                AL SHOW DEL RISTORANTE</a>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div style="margin-top: 15px;">
                <a class="btn btn-primary d-block" href="{{ route('admin.plates.index') }}">VAI AL INDEX DEI PIATTI</a>
            </div>

            <div style="margin-top: 15px;">
                <a class="btn btn-secondary d-block" href="{{ route('admin.home') }}">VAI ALLA HOME</a>
            </div>

        @else
            <div class="mt-2">
                <a class="btn btn-primary d-block" href="{{ route('admin.restaurants.create') }}">
                    CREA QUI IL TUO RISTORANTE
                </a>
            </div>
        @endif
    </div>
@endsection
