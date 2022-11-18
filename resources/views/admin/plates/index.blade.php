@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>INDEX PIATTI <span class="text-primary">{{ strtoupper($plates[0]->restaurant->user->name) }}</span></h1>

        <div class="mt-2">
            <a class="btn btn-secondary d-block" href="{{ route('admin.home') }}">VAI ALLA HOME</a>
        </div>

        <div class="mt-2">
            <a class="btn btn-warning d-block" href="{{ route('admin.restaurants.index') }}">VAI AL INDEX DEI PIATTI</a>
        </div>

        <div class="mt-2">
            <a class="btn btn-primary d-block" href="{{ route('admin.plates.create') }}">CREA QUI IL TUO PIATTO</a>
        </div>

        <ul class="p-0">
            @foreach ($plates as $plate)
                <li class="card mt-3">
                    <div class="card-body">
                        <p>Nome del piatto : <strong>{{ $plate->plate_name }}</strong></p>
                        <p>Descrizione del piatto : <strong>{{ $plate->plate_description }}</strong></p>

                        <div class="mt-2">
                            <a class="btn btn-success d-block" href="{{ route('admin.plates.show', $plate) }}">
                                VAI AL SHOW DEL PIATTO
                                <strong>{{ $plate->id }}</strong>
                            </a>
                        </div>

                        <div class="mt-2">
                            <a class="btn btn-secondary d-block" href="{{ route('admin.plates.edit', $plate) }}">
                                MODIFICA IL PIATTO
                                <strong>{{ $plate->id }}</strong>
                            </a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
