@extends('layouts.app')
 
@section('content')

<div class="container">
  <h2 class="text-center font-weight-bold">Category {{$kateg}}</h2>            
  @if (count($blog) === 0)    
    <div class="text-center">Post tidak ditemukan</div>            
    @endif
  <div class="row justify-content-center mt-4">        
    {{--  Kategori  --}}
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
        </div>
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