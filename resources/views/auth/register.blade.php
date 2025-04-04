@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="documento" class="col-md-4 col-form-label text-md-end">{{ __('Documento') }}</label>
                            <div class="col-md-6">
                                <input id="documento" type="number" class="form-control @error('documento') is-invalid @enderror" name="documento" value="{{ old('documento') }}" required>
                                @error('documento')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required>
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-end">{{ __('Apellidos') }}</label>
                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required>
                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="correo" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>
                            <div class="col-md-6">
                                <input id="correo" type="email" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{ old('correo') }}" required>
                                @error('correo')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="saldo" class="col-md-4 col-form-label text-md-end">{{ __('Saldo Inicial') }}</label>
                            <div class="col-md-6">
                                <input id="saldo" type="number" step="0.01" class="form-control @error('saldo') is-invalid @enderror" name="saldo" value="{{ old('saldo') }}" required>
                                @error('saldo')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ciudad_nac" class="col-md-4 col-form-label text-md-end">{{ __('Ciudad de Nacimiento') }}</label>
                            <div class="col-md-6">
                                <input id="ciudad_nac" type="text" class="form-control @error('ciudad_nac') is-invalid @enderror" name="ciudad_nac" value="{{ old('ciudad_nac') }}" required>
                                @error('ciudad_nac')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- CAMBIO: Corregimos el nombre a "password" -->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- NUEVO: Agregamos el campo password_confirmation -->
                        <div class="row mb-3">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>
                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('Registrarse') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
