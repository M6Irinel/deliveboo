@extends('layouts.app')

@section('content')
    <h1>INDEX PIATTI {{$plates[0]->restaurant->user->name}}</h1>
 
    <ul style="list-style: none; padding: 0;">
        @foreach ($plates as $plates)
            <li>
                <p>Partita Iva : <strong>{{ $plates->plate_name }}</strong></p>
                <p>Indirizzo : <strong>{{ $plates->plate_description }}</strong></p>

                <div style="margin-top: 15px;">
                    <a href="{{ route('admin.plates.show', $plates) }}">VAI AL SHOW</a>
                </div>
            </li>
        @endforeach
    </ul>
    <div style="margin-top: 15px;">
        <a href="{{ route('admin.home') }}">VAI ALLA HOME</a>
    </div>

    <a href="{{ route('admin.plates.create') }}">
        Crea qui il tuo Piatto
    </a>

   
@endsection
