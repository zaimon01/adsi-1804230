@extends('layouts.app')
@section('title', 'Página Inicial')

@section('content')
<div class="container">
    {{--  --}}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3><i class="fas fa-tag"></i> Artículos Importantes</h3>
            <hr>
            <div class="owl-carousel owl-theme">
                @foreach ($sliders as $slider)
                    <div class="slider" style="background-image: url({{ asset($slider->image) }})">
                        <p>
                            {{ $slider->content }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3><i class="fa fa-filter"></i> Filtrar por Categoría</h3>
            <hr>
            <div class="row">
                <div class="form-group col-md-4 offset-4">
                    @csrf
                    <select name="idcat" id="idcat" class="form-control">
                        <option value="">Seleccione Categoría...</option>
                        <option value="0">Todas</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="loader d-none text-center">
                <img src="{{ asset('imgs/loader.gif') }}" width="140px">
                <br><br>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="row justify-content-center">
        <div class="col-md-12" id="content">
            @foreach ($categories as $category)
                <h3><img src="{{ asset($category->image) }}" width="80px"></h3>
                <hr>
                <div class="row">
                @foreach ($articles as $article)
                    @if($category->id == $article->category_id)
                    <div class="col-xl-4 mb-4">
                        <div class="card mb-3" style="max-width: 540px;">
                          <div class="row no-gutters">
                            <div class="col-md-4">
                              <img src="{{ asset($article->image) }}" class="card-img-top">
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <span class="badge badge-custom"> {{ $article->category->name }} </span>
                                <h5 class="h6">{{ $article->title }}</h5>
                                <p class="card-text">
                                <strong class="h4">
                                    <i class="fas fa-dollar-sign"></i> 
                                    {{ $article->price }}
                                </strong>
                                <br>
                                  <small class="text-muted">
                                    @php
                                      $hoy = \Carbon\Carbon::now();
                                      $fcr = \Carbon\Carbon::parse($article->created_at);
                                    @endphp
                                    Creado hace: {{ $hoy->diffForHumans($fcr ,1) }}
                                  </small>
                                </p>
                                <button class="btn btn-primary"><i class="fas fa-cart-plus"></i> Comprar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection