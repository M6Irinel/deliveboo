@extends('layouts.app')

@section('content')
    <h1>INDEX</h1>

    @if ($restaurants->all())
        <ul style="list-style: none; padding: 0;">
            @foreach ($restaurants as $restaurant)
                <li>
                    <p>Partita Iva : <strong>{{ $restaurant->p_iva }}</strong></p>
                    <p>Indirizzo : <strong>{{ $restaurant->restaurant_address }}</strong></p>

                    <div style="margin-top: 15px;">
                        <a href="{{ route('admin.restaurants.show', $restaurant) }}">VAI AL SHOW</a>
                    </div>
                </li>
            @endforeach
        </ul>
        <div style="margin-top: 15px;">
            <a href="{{ route('admin.home') }}">VAI ALLA HOME</a>
        </div>
    @else
        <a href="{{ route('admin.restaurants.create') }}">
            Crea qui il tuo ristorante
        </a>
    @endif
@endsection
