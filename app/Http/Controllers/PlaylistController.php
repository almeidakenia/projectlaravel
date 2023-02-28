<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

/**
 * Class PlaylistController
 * @package App\Http\Controllers
 */
class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlists = Playlist::paginate();

        return view('playlist.index', compact('playlists'))
            ->with('i', (request()->input('page', 1) - 1) * $playlists->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $playlist = new Playlist();
        return view('playlist.create', compact('playlist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Playlist::$rules);

        $playlist = Playlist::create($request->all());

        return redirect()->route('playlists.index')
            ->with('success', 'Playlist created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $playlist = Playlist::find($id);

        return view('playlist.show', compact('playlist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $playlist = Playlist::find($id);

        return view('playlist.edit', compact('playlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Playlist $playlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playlist $playlist)
    {
        request()->validate(Playlist::$rules);

        $playlist->update($request->all());

        return redirect()->route('playlists.index')
            ->with('success', 'Playlist updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $playlist = Playlist::find($id)->delete();

        return redirect()->route('playlists.index')
            ->with('success', 'Playlist deleted successfully');
    }
}
