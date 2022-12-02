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
// array_filter(array $array, ?callable $callback = null, int $mode = 0): array
$af = array_filter(
$order->all()[0],
function ($e) {
// if (!strpos($e, '-')) {
// $s = explode('-', $e);
// return $s[1] == 'counter';
// }
return $e != 'resId' && strpos($e, '-');
},
ARRAY_FILTER_USE_KEY,
);

//explode(string $separator, string $string, int $limit = PHP_INT_MAX): array

@endphp


@foreach ($af as $key => $item)
{{ $key }} : x {{ $item }}
@endforeach



Il pagamento da lei effettuato è di : {{ $order->all()[2] }} €

Dati per la consegna:
@foreach ($order->all()[1] as $key => $item)
<p>{{ $key }}:- {{ $item }} - </p>
@endforeach



@endcomponent