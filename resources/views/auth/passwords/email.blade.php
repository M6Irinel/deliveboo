@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex center">
            <div class="f-col-8-md">
                <div class="card">
                    <h1 class="card-header fs-4">Reimposta la password</h1>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                Abbiamo inviato via email il link per reimpostare la password!
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group flex gap-10 between">
                                <label for="email" class="f-col-4-md">Addressa e-mail</label>

                                <div class="f-col-6-md">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Non riusciamo a trovare un utente con quell'indirizzo email.</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w-100">
                                    Invia collegamento per reimpostare la password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
