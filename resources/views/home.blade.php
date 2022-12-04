@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                <div style="margin-top: 15px;">
                    <a class="btn btn-primary d-block" href="{{route('admin.restaurants.index')}}">VAI AL RISTORANTE</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
