@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <div class="container text-center">
                <h1>{{ __('Restablece tu Contraseña') }}</h1>
                <img src="https://scontent.fgua3-3.fna.fbcdn.net/v/t1.6435-9/120844146_369776814151555_8607832501936159234_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=be3454&_nc_ohc=FcLGVgksJvAAX8L-LJO&_nc_ht=scontent.fgua3-3.fna&oh=00_AfCVXb32T0sorq5glg8ydeAHQ9ff3bBPr1GX6PhjzMU3Qg&oe=65622F67" width="200" height="200">
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email" class="col-form-label">{{ __('Correo Electronico:') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="password" class="col-form-label">{{ __('Contraseña:') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="password-confirm" class="col-form-label">{{ __('Confirmar Contraseña:') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Restablecer Contraseña') }}
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
