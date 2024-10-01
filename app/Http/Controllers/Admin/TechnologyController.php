<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Http\Requests\StoreTechnologyRequest;
use App\Models\Technology;
use App\Functions\Helper;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $technologies = Technology::orderBy('id', 'desc')->paginate(10);
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        // inserisco l uso della validated di StoreTechnology
        $validatedData = $request->validated();
        // Genera lo slug unico
        $validatedData['slug'] = Helper::generateSlug($validatedData['name'], Technology::class);
        Technology::create($validatedData);
        return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia creata con successo!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {

        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        // Validazione dei dati
        $validatedData = $request->validated();

        // Aggiornamento del campo slug se il nome è cambiato
        if ($validatedData['name'] !== $technology->name) {
            $validatedData['slug'] = Helper::generateSlug($validatedData['name'], Technology::class);
        }

        // Aggiornamento della tecnologia
        $technology->update($validatedData);

        return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia aggiornata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Technology cancellata con successo!');
    }
}
