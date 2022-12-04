@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex center">
            <div class="f-col-6-md">
                <div class="card">
                    <h1 class="card-header fs-4">Registrazione</h1>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group flex gap-10 between">
                                <label for="name" class="f-col-4-md">Nome attività <strong>*</strong></label>

                                <div class="f-col-8-md">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group flex gap-10 between">
                                <label for="email" class="f-col-4-md">Email/Pec <strong>*</strong></label>

                                <div class="f-col-8-md">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group flex gap-10 between">
                                <label for="password" class="f-col-4-md">Password <strong>*</strong></label>

                                <div class="f-col-8-md">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group flex gap-10 between">
                                <label for="password-confirm" class="f-col-4-md">Conferma Password
                                    <strong>*</strong></label>

                                <div class="f-col-8-md">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w-100">Registra il ristorante</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
