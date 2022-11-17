@extends('layouts.app')

@section('content')
<h2>Prova</h2>
<ul>
    @foreach ($restaurants as $r)

    <li>
        {{$r->p_iva}}
    </li>

    
    @endforeach
</ul>
    
@endsection