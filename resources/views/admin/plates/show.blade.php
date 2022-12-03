@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <a class="btn btn-secondary d-block button bold letter-spacing-3" href="{{ route('admin.plates.index') }}">
                <strong>←</strong> LISTA PIATTI
            </a>

            @if ($plate->restaurant_id == auth()->user()->id)
                <div class="d-flex">
                    <a class="mx-3 btn btn-secondary d-block button bold letter-spacing-3"
                        href="{{ route('admin.plates.edit', $plate) }}">
                        MODIFICA
                    </a>

                    <button class="btn btn-danger bold letter-spacing-3" id="openModal">ELIMINA</button>
                </div>
            @endif
        </div>

        <h1 class="my-1 t-center"><strong>{{ $plate->plate_name }}</strong></h1>

        @if ($plate->plate_image)
            <div class="card-img w-100 w-50-sm">
                <img class="h-100 w-100 obj-contain shadow" src="{{ asset('storage/' . $plate->plate_image) }} " alt="Nessuna Foto Del Piatto">
            </div>
        @else
            <div class="card-default">
                <img height="250" src="{{ asset('./img/default/plate-empty.png') }}" alt="Nessuna Foto Del Piatto">
            </div>
        @endif

        <div class="fs-3 border border-dark rounded px-1 mt-2">
            <p class="my-1 px-1 border-b"><strong>Descrizione : </strong><span class="block">{{ $plate->plate_description }}</span></p>
            <p class="my-1 px-1 border-b"><strong>Prezzo : </strong><span>{{ $plate->plate_price }} €</span></p>
            <p class="my-1 px-1"><strong>Ingredienti : </strong><span class="block">{{ $plate->ingredients }}</span></p>
        </div>
    </div>

    <div id="modal">
        <div class="body-modal">
            <p>Vuoi cancellare il piatto?</p>
            <div>
                <form action="{{ route('admin.plates.destroy', $plate) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input class="btn btn-danger btn-si" type="submit" value="SI">
                </form>

                <button class="btn btn-success btn-no" id="closeModal">No</button>
            </div>
        </div>
    </div>
@endsection
