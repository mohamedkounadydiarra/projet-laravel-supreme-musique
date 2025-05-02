<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::latest()->paginate(6);
        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation des champs du formulaire de creation de l'album

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'artist' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'cover_image' => 'nullable|image|max:10000'
        ]);
        // creation de l(album)

        $album = Album::create($validated);

        // Ajout de l'image si elle existe
        if ($request->hasFile('cover_image')) {
            $album->addMediaFromRequest('cover_image')->toMediaCollection('cover_image');
        }

        return redirect()->route('albums.index')->with('success', 'Album crée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        $album->load('songs');
        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        //validation des champs du formulaire de mises à jour de l'album

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'artist' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'cover_image' => 'nullable|image|max:2048'
        ]);
        // Mise à jours des données de l(album)

        Album::update($validated);

        // Mise à jour de l'image si une nouvelle est envoyé
        if ($request->hasFile('cover_image')) {
            // supprime l'image précédente
            $album->clearMediaCollection('cover_image');
            $album->addMediaFromRequest('cover_image')->toMediaCollection('cover_image');
        }

        return redirect()->route('albums.index')->with('success', 'Album mis à  jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->clearMediaCollection('cover_image');
        $album->delete();
        return redirect()->route('admin.album.list')->with('success', 'Album supprimé avec succès');
    }

    // la liste cote admin dashboard
    public function list()
    {
        $albums = Album::latest()->paginate(5);
        return view('albums/list',compact('albums'));
    }
}
