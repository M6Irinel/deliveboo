@component('mail::message')
# Email di conferma dell'Ordine Totale Spesa {{ $order->all()[2] }} €


<div style="color:black; background-color:#FBD7DA; padding:2rem">
<h2 style="color: red; text-align:center; padding:1rem; text-transform:uppercase"> Alla gentile attenzione del ristorante: "{{$userName}}" </h2>
<h2 style="color: green">Pagamento Effettuato Con Successo!!!</h2>
<h2>Ecco cosa è stato ordinato</h2>
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
@php
    $key = str_replace("-counter"," ", $key);
@endphp
<p style="color: darkblue; padding: 8px 0">
    {{ $key }} : x {{ $item }}
</p>
@endforeach





<div style="color: black; text-transform: capitalize;">
    Totale Spesa {{ $order->all()[2] }} € <br>
    Dati per la consegna: <br>
    @foreach ($order->all()[1] as $key => $item)
    @php
    $key = str_replace("numeroTelefono","Numero di Telefono", $key);
    @endphp
    {{ $key }}: {{ $item }} <br>
    @endforeach
</div>
    



@endcomponent