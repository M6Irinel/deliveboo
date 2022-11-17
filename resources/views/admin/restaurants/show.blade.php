@extends('layouts.app')

@section('content')
    <h1>SHOW</h1>

    <p>Partita Iva : <strong>{{ $restaurant->p_iva }}</strong></p>
    <p>Indirizzo : <strong>{{ $restaurant->restaurant_address }}</strong></p>

    <div style="margin-top: 15px;">
        <a href="{{ route('admin.restaurants.index') }}">VAI AL INDEX</a>

        <ul>
            Tipologie:
            @forelse ($restaurant->typologies as $t)
                {{-- @foreach ($post->tags as $tag) --}}

                <li> {{ $t->name }}</li>
            @empty
                <li>nessuno</li>
            @endforelse
            {{-- @endforeach --}}
        </ul>
    </div>
@endsection
