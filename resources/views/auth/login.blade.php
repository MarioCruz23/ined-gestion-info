@extends('layouts.app')

@section('content')
<style>.mint-bg {
    background-color: #bdecb6;
}</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <div class="container text-center">
                <h1>{{ __('Inicio de Sesión') }}</h1>
                <img src="https://scontent.fgua3-3.fna.fbcdn.net/v/t1.6435-9/120844146_369776814151555_8607832501936159234_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=be3454&_nc_ohc=FcLGVgksJvAAX8L-LJO&_nc_ht=scontent.fgua3-3.fna&oh=00_AfCVXb32T0sorq5glg8ydeAHQ9ff3bBPr1GX6PhjzMU3Qg&oe=65622F67" width="200" height="200">
            </div>
            <br>
            <div class="card mint-bg">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email" class="col-form-label">{{ __('Correo Electronico:') }}</label>
                                <input placeholder="nombre@ejemplo.com"  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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

                                
                                    <input placeholder="8 caracteres minimo"  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>
                        </div>
                        <br>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar Sesión') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Olvide mi Contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
