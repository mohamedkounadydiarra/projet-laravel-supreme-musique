@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col md-6" >
            <img src="{{ $album->getFirstMediaUrl('cover_image') }}" style="width: 245px;height:200px" alt="cover image song" class="img-fluid-rounded">
        </div>
        <div class="col md-6">
            <h2>{{ $album->title }}</h2>
            <p>{{ $album->description }}</p>
            <p>
                <strong>Prix: </strong>
                {{ $album->price }} FCFA
            </p>
            <form action="{{ route('orders.store') }}" method="post">
                <input type="hidden" name="album_id" value="{{ $album->id }}">
                <input type="submit" value="Acheter cet album" class="btn btn-success">
            </form>
        </div>
    </div>
    <hr>
    <h4 class="mt-4">Liste des chansons</h4>
    <ul class="list-group">
        @foreach ($album->songs as $song)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$song->title}}
            <span class="badge bg-primary rounded-pill">{{$song->duration}} </span>
        </li>
        @endforeach
    </ul>
@endsection
