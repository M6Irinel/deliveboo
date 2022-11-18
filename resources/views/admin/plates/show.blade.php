@extends('layouts.app')

@section('content')
    <h1>SHOW</h1>

    <p>Nome piatto : <strong>{{ $plate->plate_name }}</strong></p>
    <p>descrizione : <strong>{{ $plate->plate_description }}</strong></p>
    <p>Prezzo : <strong>{{ $plate->plate_price }} €</strong></p>
    <p>Ingredienti : <strong>{{ $plate->ingredients }}</strong></p>

    <div style="margin-top: 15px;">
        <a href="{{ route('admin.plates.index') }}">VAI AL INDEX</a>


    </div>

    {{-- <a href="{{ route('admin.plates.edit') }}">Modifica il piatto</a> --}}
@endsection
