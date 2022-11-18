@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>SHOW DEL PIATTO</h1>

        <p>Nome piatto : <strong>{{ $plate->plate_name }}</strong></p>
        <p>descrizione : <strong>{{ $plate->plate_description }}</strong></p>
        <p>Prezzo : <strong>{{ $plate->plate_price }} €</strong></p>
        <p>Ingredienti : <strong>{{ $plate->ingredients }}</strong></p>

        <div class="mt-2">
            <a class="btn btn-primary d-block" href="{{ route('admin.plates.index') }}">VAI AL INDEX DEI PIATTI</a>
        </div>

        <div class="mt-2">
            <a class="btn btn-secondary d-block" href="{{ route('admin.plates.edit', $plate) }}">MODIFICA IL PIATTO <strong>{{$plate->id}}</strong></a>
        </div>
    </div>
@endsection
