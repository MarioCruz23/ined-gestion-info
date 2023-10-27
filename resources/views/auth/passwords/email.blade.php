@extends('layouts.app')
@section('content')
<style>.mint-bg {
    background-color: #bdecb6;
}</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="container text-center">
                <h1>{{ __('Cambiar Contraseña') }}</h1>
                <img src="https://scontent.fgua3-3.fna.fbcdn.net/v/t1.6435-9/120844146_369776814151555_8607832501936159234_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=be3454&_nc_ohc=FcLGVgksJvAAX8L-LJO&_nc_ht=scontent.fgua3-3.fna&oh=00_AfCVXb32T0sorq5glg8ydeAHQ9ff3bBPr1GX6PhjzMU3Qg&oe=65622F67" width="200" height="200">
            </div>
            <br>
            <div class="card mint-bg">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email" class="col-form-label">{{ __('Correo Electronico:') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar enlace para restablecer contraseña') }}
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
