@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex center">
        <div class="f-col-8-md">
            <div class="card">
                <h1 class="card-header fs-4">Reseta la password</h1>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group flex">
                            <label for="email" class="f-col-4-md">Addressa e-mail</label>

                            <div class="f-col-6-md">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group flex">
                            <label for="password" class="f-col-4-md">Password</label>

                            <div class="f-col-6-md">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group flex">
                            <label for="password-confirm" class="f-col-4-md">Conferma password</label>

                            <div class="f-col-6-md">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group flex">
                            <div class="f-col-6-md">
                                <button type="submit" class="btn btn-primary w-100">
                                    Reseta la password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
