@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{route('admin.index')}}" class="btn btn-primary mb-3">
    <i class="fas fa-arrow-left mr-2"></i>Back
</a>
    <div class="card col-8 mx-auto">
        <div class="card-body">
            <h2 class="text-center font-weight-bold">Create Post</h2>            
            <form action="{{ route('admin.store') }}" method="Post" enctype="multipart/form-data">
                  @csrf
                  {{--  Gambar  --}}
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" name="image" class="form-control-file" id="image">
                </div>

                {{--  Author  --}}
                <div class="form-group">
                    {{--  <label for="author">Author</label>  --}}
                    <input type="hidden" class="form-control" name="author" id="author" placeholder="Ini author" value="{{Auth::user()->name}}">
                </div>                

                {{--  Title  --}}
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Judul postingan">
                </div>                
                
                {{--  Kategori  --}}                
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" id="kategori" name="category">
                        <option>Java</option>
                        <option>Kotlin</option>
                        <option>PHP</option>                        
                        <option>Javascript</option>
                        {{--  <option>Ruby</option>
                        <option>Python</option>
                        <option>Dart</option>                          --}}
                        <option>C</option>
                        <option>C++</option>
                        {{--  <option>Lainnya</option>  --}}
                    </select>
                </div>
                {{--  Tag  --}}
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" class="form-control" name="tag" id="tag" placeholder="#tag1, #tag2, #tag3">
                </div>                
                {{--  Konten  --}}
                <div class="form-group">
                    <label for="isi">Konten</label>
                    <textarea name="isi" id="mytextarea" cols="30" rows="10" class="form-control"></textarea>
                    <input type="submit" value="Post" class="btn btn-primary mt-3">
                </div>
            </form>
        </div>
    </div>
</div>

 <script src='https://cloud.tinymce.com/5/tinymce.min.js?apiKey=xq47pkcma5pd50cj6jpn1bhnmqshtwc6s9m95uagz0untgg3'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>

@endsection
