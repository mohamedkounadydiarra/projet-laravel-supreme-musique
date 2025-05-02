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

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Artist</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($albums as $album)
                        <tr>
                            <td>
                                <img src="{{ $album->getFirstMediaUrl('cover_image') }}" alt="Album Cover" style="width: 80px; height: 80px; object-fit: cover;">
                            </td>
                            <td>{{ $album->title }}</td>
                            <td>{{ $album->description }}</td>
                            <td>{{ $album->artist }}</td>
                            <td>{{ $album->price }}F</td>
                            <td>
                                <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-sm btn-primary">
                                    Éditer
                                </a>
                                <form action="{{ route('albums.destroy', $album->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Es-tu sûr de vouloir supprimer cet album ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                   
                </tbody>             
            </table>
            {{$albums->links()}}
        </div>
        
@endsection