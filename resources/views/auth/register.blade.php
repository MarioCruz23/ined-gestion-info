@extends('layouts.app')
@section('content')
<style>.mint-bg {
    background-color: #bdecb6;
}</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="container text-center">
                <h1>{{ __('Registro de Usuarios') }}</h1>
                <img src="https://scontent.fgua3-3.fna.fbcdn.net/v/t1.6435-9/120844146_369776814151555_8607832501936159234_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=be3454&_nc_ohc=FcLGVgksJvAAX8L-LJO&_nc_ht=scontent.fgua3-3.fna&oh=00_AfCVXb32T0sorq5glg8ydeAHQ9ff3bBPr1GX6PhjzMU3Qg&oe=65622F67" width="200" height="200">
            </div>
            <br>
            <div class="card mint-bg">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="name" class="col-form-label">{{ __('Nombre:') }}</label>
                                <input placeholder="ejemplo: Edna Torres" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email" class="col-form-label">{{ __('Correo Electrónico:') }}</label>
                                <input placeholder="nombre@ejemplo.com" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                <input placeholder="8 caracteres mínimo" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
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
                                <input placeholder="" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <br>
                        <div class="row form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
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
