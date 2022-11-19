@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>INDEX PIATTI - <span class="text-primary">{{ strtoupper($name) }}</span></h1>

        <div class="d-flex justify-content-center">
            <div class="my-2 mx-3">
                <a class="btn btn-success button" href="{{ route('admin.restaurants.index') }}">
                    VAI AL RISTORANTE</a>
            </div>

            <div class="my-2 mx-3">
                <a class="btn btn-primary button" href="{{ route('admin.plates.create') }}">CREA QUI IL TUO PIATTO</a>
            </div>
        </div>

        @if ($plates->all() != [])
            <ul class="p-0 layout-card mt-3">
                @foreach ($plates as $plate)
                    <li class="card-n position-relative">
                        <div class="badge badge-primary position-absolute badge-n">ID {{ $plate->id }}</div>

                        @if ($plate->plate_image)
                            <div class="card-img">
                                <img class="img-fluid" src="{{ asset('storage/' . $plate->plate_image) }} "
                                    alt="Nessuna Foto Del Piatto">
                            </div>
                        @else
                            <div class="h-200px center-x-y text-center font-weight-bold">
                                QUESTO PIATTO NON HA ANCORA UNA IMMAGINE!
                            </div>
                        @endif

                        <div class="mt-auto d-flex flex-column">
                            <h4>{{ $plate->plate_name }}</h4>
                            <p class="card-text">Descrizione<strong
                                    class="d-block card-d">{{ $plate->plate_description }}</strong></p>

                            <div class="mt-2">
                                <a class="btn btn-success d-block button" href="{{ route('admin.plates.show', $plate) }}">
                                    SHOW
                                </a>
                            </div>

                            <div class="mt-2">
                                <a class="btn btn-warning d-block button" href="{{ route('admin.plates.edit', $plate) }}">
                                    MODIFICA
                                </a>
                            </div>

                            <div class="mt-2">
                                <form action="{{ route('admin.plates.destroy', $plate) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input class="btn btn-danger d-block button w-100" type="submit"
                                        value="ELIMINA">
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
