@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{asset('imgs/register.png')}}" height="360px" class="card-img-top">
                        <div class="card-title text-center">
                            <h3>
                                <i class="fa fa-users"></i>
                                {{__('custom.title-login')}}
                            </h3>
                        </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="container">Nombre:
                            </div>
                                <div class="col-12">
                                    <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" class="form-control" value="{{ old('fullname') }}">
                                        @error('fullname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                        @enderror
                                            </span>
                                        <br><br>
                                </div>
                                    <div class="container">Correo Electronico:
                                    </div>
                                        <div class="col-12">    
                                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                        @enderror
                                            </span>
                                        <br><br>
                                        </div>
                                    <div class="container">Telefono:
                                    </div>
                                        <div class="col-12">
                                            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" >
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                        @enderror
                                            </span>
                                        <br><br>
                                        </div>
                                        <div class="container">
        Fecha de Nacimiento:
    </div>
    <div class="col-12">
        <input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{ old('birthdate') }}">
        @error('birthdate')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
            @enderror
        </span>
        <br><br>
    </div>
        <div class="container">
            Genero:
        </div>
        <div class="col-12">
        <select name="gender" class="form-control @error('gender') is-invalid @enderror">
            <option value="">Seleccion genero...</option>
            <option value="Male" @if (old('gender') == 'Male') selected @endif>Hombre</option>
            <option value="Female" @if (old('gender') == 'Female') selected @endif>Mujer</option>
        </select>
        @error('gender')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
            @enderror
        </span>
        <br><br>
    </div>
    <div class="container">
        Direccion:
    </div>
    <div class="col-12">
        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
            @enderror
        </span>
        <br><br>
    </div>
    <div class="container">
        Contraseña:
    </div>
    <div class="col-12">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
            @enderror
        </span>
        <br><br>
    </div>
    <div class="container">
        Confirmar Contraseña:
    </div>
    <div class="col-12">
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" >
        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
            @enderror
        </span>
        <br><br>
    </div>
    <div class="container">
        <button type="submit" class="btn btn-block btn-custom"> <i class="fa fa-save"></i> Registrarse </button>
    </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
