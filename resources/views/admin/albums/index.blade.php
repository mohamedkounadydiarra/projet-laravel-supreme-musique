@extends('layouts.admin')
@section('content')
<h2>Liste des albums</h2>
<a href="{{route('albums.create')}}" class="btn btn-primary mb-3">Ajouter un albums</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Pochette</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($albums as $albums)
            <tr>
                <td>{{ $album->id }}</td>
                <td>{{ $album->title }}</td>
                <td>
                    @if ($album->cover_image)
                    <img src="{{ $album->getFirstMediaUrl('cover_image') }}" alt="Album Cover" style="width: 60px;">
                    @else
                    <em>Pas d'image</em>
                    @endif
                </td>
                <td>
                    <a href="{{ route('albums.edit', $album) }}" class="btn btn-sm btn-warning">
                        🖍
                    </a>
                    <form action="{{ route('albums.destroy', $album) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Es-tu sûr de vouloir supprimer cet album ?')">
                            🗑
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{$albums->links()}}
@endsection