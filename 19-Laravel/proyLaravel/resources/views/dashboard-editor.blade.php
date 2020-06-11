@extends('layouts.app')
@section('title', 'Escritorio - Editor')

@section('content')
<div class="container">
    <div class="row justify-content-center">
           <div class="col-md-4 mt-5">
            <div class="card">
                    <img src="{{asset('imgs/mydata.png')}}" height="280px" class="card-img-top">
                    <div class="card-body">
                        <a href="{{ url('mydata') }}" class="btn btn-block btn-custom">
                            Mis Datos
                        </a>
                    </div>
                </div>
            </div>
               <div class="col-md-4 mt-5">
            <div class="card">
                    <img src="{{asset('imgs/myarticles.png')}}" height="280px" class="card-img-top">
                    <div class="card-body">
                        <a href="{{ url('myarticles') }}" class="btn btn-block btn-custom">
                            Mis Articulos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
