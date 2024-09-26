<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::where('is_visible', true)->get();
        return view('songs.index', compact('songs'));
    }

    public function create()
    {
        return view('songs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'lyrics' => 'required',
        ]);

        Song::create($request->all());

        return redirect()->route('songs.index')
            ->with('success', 'Canción creada exitosamente.');
    }

    public function show(Song $song)
    {
        return view('songs.show', compact('song'));
    }

    public function edit(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    public function update(Request $request, Song $song)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'lyrics' => 'required',
        ]);

        $song->update($request->all());

        return redirect()->route('songs.index')
            ->with('success', 'Canción actualizada exitosamente.');
    }

    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route('songs.index')
            ->with('success', 'Canción eliminada exitosamente.');
    }

    public function toggleVisibility(Song $song)
    {
        $song->is_visible = !$song->is_visible;
        $song->save();

        return redirect()->route('songs.index')
            ->with('success', 'Visibilidad de la canción actualizada.');
    }
}