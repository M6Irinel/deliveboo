@extends('layouts.app')
@section('script')
    function showModal(id){
    const modal = document.getElementById("modal");
    modal.classList.replace("d-none", "d-flex");
    }

    function hideModal(id){
    const modal = document.getElementById("modal");
    modal.classList.replace("d-flex","d-none");
    }

    function showSuccess(id){
    const form = document.getElementById("form-delete-" + id);
    const modal = document.getElementById("success-modal");
    modal.classList.replace("d-none", "d-flex");
    setTimeout(function (){
    form.submit();
    },1000);
    }
@endsection
@section('content')
    <div class="container">

        <h1>SHOW DEL PIATTO</h1>

        <p>Nome piatto : <strong>{{ $plate->plate_name }}</strong></p>
        <p>descrizione : <strong>{{ $plate->plate_description }}</strong></p>
        <p>Prezzo : <strong>{{ $plate->plate_price }} €</strong></p>
        <p>Ingredienti : <strong>{{ $plate->ingredients }}</strong></p>

        <img src="{{ asset('storage/' . $plate->plate_image) }} " height="250" alt="">

        <div class="d-flex justify-content-center">
            <div class="mt-2 mx-3">
                <a class="btn btn-primary d-block button" href="{{ route('admin.plates.index') }}">
                    VAI AL INDEX DEI PIATTI
                </a>
            </div>

            <div class="mt-2 mx-3">
                <a class="btn btn-secondary d-block button" href="{{ route('admin.plates.edit', $plate) }}">
                    MODIFICA
                </a>
            </div>

            <div class="mt-2 mx-3">
                <div class="mt-2">
                    <button class="btn btn-danger" onclick="showModal({{$plate->id}})" class="modal">Elimina</button>

                </div>
                <div id="modal">
                    <p>Vuoi cancelare il piatto?</p>
                    <div>
                        <form action="{{ route('admin.plates.destroy', $plate) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <input class="btn btn-danger" type="submit" value="SI">
                        </form>
                        <button class="btn btn-success" onclick="hideModal()" id="nomodal">No</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
