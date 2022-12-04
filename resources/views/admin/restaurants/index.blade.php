@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex center">
            <div class="mx-3">
                <a class="btn btn-primary d-block button bold letter-spacing-3" href="{{ route('admin.plates.index') }}">
                    LISTA PIATTI
                </a>
            </div>

            <div class="mx-3">
                <a class="btn btn-success d-block button bold letter-spacing-3"
                    href="{{ route('admin.plates.create') }}">NUOVO PIATTO</a>
            </div>
        </div>

        <h1 class="text-primary mt-3"><strong>{{ strtoupper($name) }}</strong></h1>

        @if ($restaurants->all())
            <ul class="list-style-none p-0 fs-3">
                @foreach ($restaurants as $restaurant)
                    <li>
                        @if ($restaurant->restaurant_image)
                            <div class="my-3 w-100 w-50-xs">
                                <img class="img-fluid" src="{{ asset('storage/' . $restaurant->restaurant_image) }}"
                                    alt="IMMAGINE DEL RISTORANTE">
                            </div>
                        @else
                            <h3>NON HAI VOLUTO INSERIRE UNA IMMAGINE DEL RISTORANTE!?</h3>
                        @endif

                        <p>Partita Iva : <strong>{{ $restaurant->p_iva }}</strong></p>
                        <p>Indirizzo : <strong>{{ $restaurant->restaurant_address }}</strong></p>
                        <p>Descrizione : <strong>{{ $restaurant->restaurant_description }}</strong></p>
                        <p>Numero di telefono : <a class="black"
                                href="tel:{{ $restaurant->restaurant_phone_number }}">{{ $restaurant->restaurant_phone_number }}</a>
                        </p>

                        @if ($restaurant->restaurant_website)
                            <p>Sito Web : <a href="#" class="black">{{ $restaurant->restaurant_website }}</a></p>
                        @else
                            <p>Sito Web : <strong>-----</strong></p>
                        @endif

                        <div style="margin-top: 15px;">
                            <ul class="list-n">
                                <p class="m-0">Tipologie:</p>
                                @forelse ($restaurant->typologies as $t)
                                    <li class="list-item-n"> {{ $t->name }}</li>
                                @empty
                                    <li>nessuno</li>
                                @endforelse
                            </ul>
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
