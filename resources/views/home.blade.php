@extends('layouts.app')
 
@section('content')

<div class="jumbotron jumbotron-fluid bg-dark text-light" style="margin-top:-24px;">
  <div class="container py-5">
    <h1 class="display-5">Temukan Beragam Artikel Menarik</h1>
    <p class="lead">Mulailah mengetik agar menjadi pribadi yang kreatif.</p>
    
  </div>
</div>


<div class="container">
  <h2 class="text-center font-weight-bold">Latest Post</h2>            
  <div class="row justify-content-center col-12 mt-4">    
    {{--    --}}
    <div class="card-columns">
    @foreach ($blog as $post)
      <div class="card cardpost">
        <a href="{{route('details',$post->id)}}">
          <img src="{{ asset('storage/img/') }}{{ '/' . $post->img }}" class="imgcard" alt="...">
        </a>
        <div class="card-body">
          <h4 class="text-capitalize headercard">
            <a class="text-dark" href="{{route('details',$post->id)}}">{{$post->title}}</a>
          </h4>          
          <small class="card-text text-muted">{{$post->updated_at->format('d F Y')}}</small>
          {{--  <p class="card-text">{{$post->author}}</p>  --}}          
        </div>
        {{--  <div class="card-footer">
          <small class="text-muted">{{$post->updated_at->format('d F Y')}}</small>
        </div>  --}}
      </div>
    @endforeach
  </div>
    {{--    --}}        

    <div class="mt-3 col-12">
      {{ $blog->links() }}
    </div>  
  </div>
</div>

@endsection