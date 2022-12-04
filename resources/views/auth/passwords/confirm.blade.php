@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex center">
        <div class="f-col-8-md">
            <div class="card">
                <h1 class="card-header fs-4">Conferma password</h1>

                <div class="card-body">
                    <p>Si prega di confermare la password prima di continuare</p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group flex gap-10 between">
                            <label for="password" class="f-col-4-md">{{ __('Password') }}</label>

                            <div class="f-col-6-md">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group flex">
                            <div class="f-col-8-md">
                                <button type="submit" class="btn btn-primary">
                                    Conferma password
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link w-100" href="{{ route('password.request') }}">
                                        Hai dimenticato la password?
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
