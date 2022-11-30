@component('mail::message')
    # Stile di Laravel per le Email

    Pagamento Effettuato

    {{-- @component('mail::button', ['url' => route('admin.posts.show', $post)])
{{$post->title}}
@endcomponent --}}


    {{-- {{$order->all()}} --}}

        @foreach ($order->all()[0] as $key => $item)
            {{ $key }} : {{ $item }}
        @endforeach
  
      {{ $order->all()[0]['resId']}} res Id
        {{$order->all()[1]}}



    Nuovo Ordine Pagato<br>
    {{ config('app.name') }}
@endcomponent
