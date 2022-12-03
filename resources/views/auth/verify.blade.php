@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex center">
        <div class="f-col-8-md">
            <div class="card">
                <div class="card-header">Verifica la tua adressa e-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Un nuovo link di verifica è stato inviato al tuo indirizzo email
                        </div>
                    @endif

                    Prima di procedere, controlla la tua e-mail per un link di verifica.
                    Se non hai ricevuto l'e-mail
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">clicca qui per richiederne un altro</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
