@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between mb-3">
            <div>
                <a class="btn btn-secondary button" href="{{ route('admin.restaurants.index') }}">
                    <strong>←</strong> VAI AL RISTORANTE
                </a>
            </div>

            <div>
                <a class="btn btn-success button" href="{{ route('admin.plates.create') }}">
                    NUOVO PIATTO
                </a>
            </div>
        </div>

        <h1>PIATTI - <span class="text-primary">{{ strtoupper($name) }}</span></h1>

        @if ($plates->all() != [])
            <ul class="p-0 layout-card mt-3 grid-12">
                @foreach ($plates as $plate)
                    <li class="card-n position-relative g-col-6">

                        <a class="btn" href="{{ route('admin.plates.show', $plate) }}">
                            @if ($plate->plate_image)
                                <div class="card-img">
                                    <img class="h-100 w-100 obj-cover" src="{{ asset('storage/' . $plate->plate_image) }} "
                                        alt="Nessuna Foto Del Piatto">
                                </div>
                            @else
                                <div class="card-default">
                                    <img class="img-fluid" src="{{ asset('./img/default/plate-empty.png') }}"
                                        alt="Nessuna Foto Del Piatto">
                                </div>
                            @endif

                            <div class="mt-auto d-flex flex-column">
                                <h4>{{ $plate->plate_name }}</h4>
                                <p class="card-text">
                                    Descrizione
                                    <strong class="d-block card-d">
                                        {{ $plate->plate_description }}
                                    </strong>
                                </p>
                                <p class="card-text">
                                    Ingredienti
                                    <strong class="d-block card-d">
                                        {{$plate->ingredients}}
                                    </strong>
                                </p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
