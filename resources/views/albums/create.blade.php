@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2 class="mb-4">Ajouter un album</h2>

        {{-- Affichage des erreur de validation --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <form method="post" action="{{ route('albums.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Titre</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea name="description" id="" class="form-control" cols="30" rows="10"  value="{{old('description')}}" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Artiste nom</label>
                <input type="text" class="form-control" name="artist"  value="{{old('artist')}}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Prix (fcfa)</label>
                <input type="number" class="form-control" name="price"  value="{{old('price')}}" step="100" min="0" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Image de couverture</label>
                <input type="file" class="form-control" name="cover_image" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Creer l'album</button>
        </form>
    </div>
@endsection
