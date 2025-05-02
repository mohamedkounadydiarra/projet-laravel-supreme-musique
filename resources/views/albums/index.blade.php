@extends('layouts.app')
@section('content')
   <h2 class="mb-4">Tous les albums</h2> 
   <div class="row">
        @foreach ($albums as $album)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $album->getFirstMediaUrl('cover_image') }}" alt="cover image" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$album->title}}</h5>
                        <p>{{Str::limit($album->description,80)}} </p>
                        <p>{{$album->artist}} </p>
                        <p style="color:rgb(16, 184, 250)">{{$album->price}} Cfa</p>
                        <a href="{{route('albums.show',$album)}}">Voir l'album</a>
                    </div>
                </div>
            </div>
        @endforeach
        {{$albums->links()}}
   </div>
@endsection

