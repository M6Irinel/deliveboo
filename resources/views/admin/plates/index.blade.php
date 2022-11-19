@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>INDEX PIATTI <span class="text-primary">{{ strtoupper($name) }}</span></h1>

        <div class="d-flex justify-content-center">
            <div class="my-2 mx-3">
                <a class="btn btn-secondary button" href="{{ route('admin.home') }}">VAI ALLA HOME</a>
            </div>

            <div class="my-2 mx-3">
                <a class="btn btn-warning button" href="{{ route('admin.restaurants.index') }}">VAI ALL' INDEX DEL
                    RISTORANTE</a>
            </div>

            <div class="my-2 mx-3">
                <a class="btn btn-primary button" href="{{ route('admin.plates.create') }}">CREA QUI IL TUO PIATTO</a>
            </div>
        </div>

        @if ($plates->all() != [])
            <ul class="p-0 layout-card mt-3">
                @foreach ($plates as $plate)
                    <li class="card-n">
                        <img class="card-img-top" src="{{ asset('storage/' . $plate->plate_image) }} " height="200" alt="Nessuna Foto Del Piatto">

                        <div class="card-body mt-auto">

                            <h5 class="card-title">Nome del piatto : <strong>{{ $plate->plate_name }}</strong></h5>
                            <p class="card-text">Descrizione del piatto : <strong class="d-block card-d">{{ $plate->plate_description }}</strong></p>

                            <div class="mt-2">
                                <a class="btn btn-success d-block button" href="{{ route('admin.plates.show', $plate) }}">
                                    VAI AL SHOW DEL PIATTO
                                    <strong>{{ $plate->id }}</strong>
                                </a>
                            </div>

                            <div class="mt-2">
                                <a class="btn btn-secondary d-block button" href="{{ route('admin.plates.edit', $plate) }}">
                                    MODIFICA IL PIATTO
                                    <strong>{{ $plate->id }}</strong>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
