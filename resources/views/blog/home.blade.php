@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{route('admin.create')}}" class="btn btn-primary mb-3">Create Post</a>
    <div class="card">
        <div class="card-body">
            <h2 class="text-center font-weight-bold">My Post</h2>            
            <table class="table table-striped mt-3">
                <thead class="thead">
                    <tr>
                        <th class="text-center" scope="col">ID</th>
                        <th class="text-center" scope="col">Judul</th>
                        {{--  <th class="text-center" scope="col">Konten</th>  --}}
                        <th class="text-center" scope="col">Gambar</th>
                        <th class="text-center" scope="col">Kategori</th>
                        <th class="text-center" scope="col">Tag</th>                    
                        <th class="text-center" scope="col">Dibuat</th>
                        <th class="text-center" scope="col">Diupdate</th>
                        {{--  <th class="text-center" colspan="3" scope="col">Handle</th>  --}}
                        <th class="text-center" scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>                    
                        @if ($blog->count() > 0)                        
                        @foreach ($blog as $post)
                        <tr>
                        <th class="text-center">{{$post->id}}</th>
                        <td class="text-left" >{{$post->title}}</td>
                        {{--  <td class="text-center" style=' white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 75ch;'>{{$post->isi}}</td>  --}}
                        <td class="text-center" ><img class="imgsmall" width="100px;" src="{{ asset('storage/img/') }}{{ '/' . $post->img }}" alt=""></td>
                        <td class="text-center" >{{$post->category}}</td>
                        <td class="text-center" >{{$post->tag}}</td>                        
                        <td class="text-center" >{{$post->created_at->format('d F Y H:i')}}</td>
                        <td class="text-center" >{{$post->updated_at->format('d F Y H:i')}}</td>                    
                            <td class="text-center" class="text-center">                                                                
                                <a class="mx-1" href="{{route('details',$post->id)}}">
                                    <i class="far fa-eye" title="View"></i>    
                                </a>                                                                                              
                                <a class="mx-1" href="{{ route('edit', $post->id) }}">
                                    <i class="fas fa-edit" title="Edit"></i>
                                </a>                             
                                <a class="mx-1" href="{{route('delete',$post->id)}}">
                                    <i class="fas fa-trash-alt" title="Delete"></i>
                                </a>                                
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>Anda belum memiliki postingan</td>
                        </tr>
                        @endif            
                    </tbody>
                    </table>                    
                <div class="">
                    {{ $blog->links() }}
                </div>                
        </div>
    </div>
</div>
@endsection