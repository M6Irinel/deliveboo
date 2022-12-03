<style>
  
  
</style>
@component('mail::message')
# Email dell'Ordine Effettuato Totale Spesa {{ $order->all()[2] }} €





{{-- h2 e p li prende  --}}

<h2 style="color: red; text-align:center; padding:1rem; text-transform:uppercase"> Email per {{$order->all()[1]['nome']}}</h2>

<div style="color:black; padding:2rem; background-color:#FBD7DA">
    <p>Grazie per Aver scelto noi</p>
    <p>Attendi il tuo ordine comodamente a casa tua</p>
    <p>Ordine Pagato e in Lavorazione, Grazie dal Team di Deliveboo</p>
    <p>Ecco il riepilogo dell Ordine</p>
</div>


@php
$af = array_filter(
$order->all()[0],
function ($e) {

return $e != 'resId' && strpos($e, '-');
},
ARRAY_FILTER_USE_KEY,
);


@endphp


@foreach ($af as $key => $item)
@php
    $key = str_replace("-counter"," ", $key);
@endphp
<p style="color: darkblue; padding: 8px 0">
    {{ $key }} : x {{ $item }}
</p>
@endforeach


<div style="color: black; text-transform: capitalize;">
Il pagamento da lei effettuato è di : {{ $order->all()[2] }} €

Dati per la consegna: <br>
@foreach ($order->all()[1] as $key => $item)
@php
$key = str_replace("numeroTelefono","Numero di Telefono", $key);
@endphp
{{ $key }}: {{ $item }} <br>
@endforeach
</div>



@endcomponent