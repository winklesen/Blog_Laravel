@extends('layouts.app')

@section('content')
<div class="container-fluid pt-2">  
  <div class="row justify-content-center col-12 ">
    <!-- Konten -->
    <div class="col-md-8 mx-auto">
      
      <h1 class="text-head-detail text-center font-weight-bold text-capitalize mb-3">{{$blog->title}}</h1>        
      <p class="text-center">Diketik oleh <span class="text-info">{{$blog->author}}</span>, dipublikasi pada {{$blog->updated_at->format('d F Y')}} dalam kategori <span class="text-info">{{$blog->category}}</span></p>
      
      
		  <div class="card shadow-sm" >
        <img src="{{ asset('storage/img/') }}{{ '/' . $blog->img }}" class="card-img mx-auto img-card-detail" alt="{{$blog->img}}" >
        <div class="card-body">          
          <p class="card-text">
            {!!$blog->isi!!}
          </p>          
        </div>
      </div>	    	      

            
      <div class="divider mt-5"></div>
      {{--  Tag  --}}
      <div class="row px-4 my-4">        
        @if ($blog->tag != "")
          @foreach(explode(',', $blog->tag) as $tagged) 
          <a href="#" class="tagpost my-auto text-dark mx-1">{{$tagged}}</a>                                
          @endforeach
        @endif

      </div>
      <div class="divider mt-b"></div>
      {{--  @include('layouts.sidebar')      --}}

      <div class="row px-4 pt-3">        
        <form action="{{ route('komen.store') }}" method="Post" enctype="multipart/form-data">
          {{--  Idpost  --}}
                <div class="form-group">
                    {{--  <label for="author">Author</label>  --}}
                    <input type="hidden" class="form-control" name="idpost" id="idpost" placeholder="Ini idpost" value="{{$blog->id}}">
                </div>                
          {{--  user  --}}
                <div class="form-group">
                    {{--  <label for="author">Author</label>  --}}
                    <input type="hidden" class="form-control" name="author" id="author" placeholder="Ini author" value="{{{ isset(Auth::user()->name) ? Auth::user()->name : 'Guest' }}}">
                </div>                
          {{--  Komentar  --}}
          <div class="form-group">
              <label for="comment"><h5 class="font-weight-bold">Komentar</h5></label>
              <textarea name="comment" id="comment" cols="150" rows="4" class="form-control" placeholder="Ketik komentar..."></textarea>
              <input type="submit" value="Kirim" class="btn btn-primary mt-3">
          </div>      
        @csrf
        </form>        
      </div>

       <div class="row px-4">        
        @foreach ($comment as $komentar)
        <div class="card w-100 mb-3 shadow-sm">
          <div class="card-header d-flex">            
              <img src="{{ asset('storage/img/') }}{{ '/' . 'useruser.jpg' }}" width="7%" height="100%" style="border-radius: 100%;" class="rounded rounded-circle" alt="">                          
            <span class="ml-3 my-auto">
              <strong class="card-title">{{$komentar->author}}</strong>
              <div class="text-muted text-small">{{$komentar->created_at->format('d F Y ')}}</div>
            </span>            
          </div>
          <div class="card-body">            
            <p class="card-text">{{$komentar->isi}}</p>            
          </div>          
        </div>
        @endforeach
      </div> 
    {{$comment->links()}}
    </div>

    {{--  <div class="divider mt-3 w-75"></div>  --}}

    <div class="row col-10 my-4">
      {{-- Artikel lain   --}}      
      <h4 class=" my-3">Artikel Lainnya</h4>
      <div class="card-deck">        
          @foreach ($semua as $post)
          <div class="card cardpost ">
            <a href="{{route('details',$post->id)}}">
              <img src="{{ asset('storage/img/') }}{{ '/' . $post->img }}" class="imgcard2" alt="...">
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
      </div>  
    </div>
    
</div>
@endsection
    