<?php

namespace App\Http\Controllers;

use App\Models\Cantante;
use Illuminate\Http\Request;

/**
 * Class CantanteController
 * @package App\Http\Controllers
 */
class CantanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cantantes = Cantante::paginate();

        return view('cantante.index', compact('cantantes'))
            ->with('i', (request()->input('page', 1) - 1) * $cantantes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cantante = new Cantante();
        return view('cantante.create', compact('cantante'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cantante::$rules);

        $cantante = Cantante::create($request->all());

        return redirect()->route('cantantes.index')
            ->with('success', 'Cantante created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cantante = Cantante::find($id);

        return view('cantante.show', compact('cantante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cantante = Cantante::find($id);

        return view('cantante.edit', compact('cantante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cantante $cantante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cantante $cantante)
    {
        request()->validate(Cantante::$rules);

        $cantante->update($request->all());

        return redirect()->route('cantantes.index')
            ->with('success', 'Cantante updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cantante = Cantante::find($id)->delete();

        return redirect()->route('cantantes.index')
            ->with('success', 'Cantante deleted successfully');
    }
}
