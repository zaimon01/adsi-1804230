@if (isset($category))
     <h3><img src="{{asset($category->image)}}" width="80px"></h3>
    <hr>
    @foreach ($articles as $article)
        @if ($category->id == $article->category_id)
<div class="card mb-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="{{ asset($article->image) }}" class="card-img" alt="">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{$article->title}}</h5>
            <p class="card-text">{{$article->content}}</p>
            <p class="card-text"><small class="text-muted"><h4>US.${{$article->price}}.99</h4></small></p>
            <button class="btn btn-primary"><i class="fas fa-cart-plus"></i> Comprar</button>
          </div>
        </div>
      </div>
</div>
        @endif
    @endforeach
@else
     @foreach ($categories as $category)
        <h3><img src="{{asset($category->image)}}" width="80px"></h3>
        <hr>
        @foreach ($articles as $article)
            @if ($category->id == $article->category_id)
<div class="card mb-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="{{ asset($article->image) }}" class="card-img" alt="">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{$article->title}}</h5>
            <p class="card-text">{{$article->content}}</p>
            <p class="card-text"><small class="text-muted"><h4>US.${{$article->price}}.99</h4></small></p>
            <button class="btn btn-primary"><i class="fas fa-cart-plus"></i> Comprar</button>
          </div>
        </div>
      </div>
</div>
            @endif
        @endforeach
    @endforeach
@endif