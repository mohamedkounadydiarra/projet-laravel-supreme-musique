@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2 class="mb-4">Modifier l'album : {{$album->title}} </h2>

        {{-- Affichage des erreur de validation --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form method="post" action="{{ route('albums.update', $album) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Titre</label>
                <input type="text" class="form-control" name="title" value="{{old('title', $album->title)}}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea name="description" id="" cols="30" rows="10"  value="{{old('description', $album->description)}}" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Artiste nom</label>
                <input type="text" class="form-control" name="artist"  value="{{old('artist', $album->artist)}}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Prix (fcfa)</label>
                <input type="number" class="form-control" name="price"  value="{{old('price', $album->price)}}" step="100" min="0" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Image de couverture</label>
                <input type="file" class="form-control" name="cover_image" accept="image/*" required>
                @if ($album->getFirstMediaUrl('cover_image'))
                    <div class="mt-2">
                        <strong>Image actuelle: </strong> <br>
                        <img src="{{$album->getFirstMediaUrl('cover_image')}}" alt="image album" class="img-fluid rounded" style="max-height: 150px">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{route('albums.index')}}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
