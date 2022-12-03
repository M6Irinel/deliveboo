@component('mail::message')
# Email di conferma della registrazione del ristorante



<h2>Hai registrato il Tuo Ristorante: --{{$restaurant}}--</h2>

{{ config('app.name') }}
@endcomponent