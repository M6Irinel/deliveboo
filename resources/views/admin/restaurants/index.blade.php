@extends('layouts.app')

@section('content')
<h2>Prova</h2>
{{-- @dd($restaurants) --}}
@if($restaurants->all())
<ul>
    sono nell if
    @foreach ($restaurants as $r)

    <li>
        {{$r->p_iva}}
        {{$r->restaurant_address}}
    </li>

    
    @endforeach
</ul>
@else
<a href="{{route('admin.restaurants.create')}}">
    crea qui il tuo ristorante
</a>
@endif


    
@endsection