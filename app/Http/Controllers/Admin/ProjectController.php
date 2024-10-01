<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Http\Requests\StoreProjectRequest;
use App\Functions\Helper;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
use Laravel\Prompts\Progress;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // inserisco model Request ed inserisco il valore
    public function index(Request $request)
    {

        // Valore di ricerca
        $search = $request->input('search');

        // Inizializzo la query con il caricamento delle relazioni necessarie
        $projects = Project::with('type');

        // Aggiungo la condizione di ricerca se il valore è presente
        if (!empty($search)) {
            $projects->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('id', $search);
            });
        }

        // Applico la paginazione alla query
        $projects = $projects->orderBy('id', 'desc')->paginate(10);

        // Ritorno la vista con i progetti filtrati
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // ottengo tutti i type
        $types = Type::all();
        // ottengo tutte le technology
        $technologies = Technology::all();
        return view('Admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['slug'] = Helper::generateSlug($validatedData['name'], Project::class);

        // Verifica se è presente un file di immagine e lo gestisce
        if ($request->hasFile('path_image')) {
            // Salva l'immagine nella cartella 'uploads'
            $image_path = Storage::put('uploads', $request->file('path_image'));

            // Ottiene il nome originale dell'immagine
            $original_name = $request->file('path_image')->getClientOriginalName();

            // Salva i percorsi nel validatedData
            $validatedData['path_image'] = $image_path;
            $validatedData['image_original_name'] = $original_name;
        } else {
            // Assicurati che sia null se non è presente
            $validatedData['path_image'] = null;
            $validatedData['image_original_name'] = null;
        }

        // Crea il progetto con i dati validati
        $project = Project::create($validatedData);

        // Associa le tecnologie selezionate (se presenti)
        if (!empty($request->technologies)) {
            $project->technologies()->attach($request->technologies);
        }

        return redirect()->route('admin.projects.index')->with('success', 'Progetto creato con successo!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load('type');
        // dd($project);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // ottengo tutti i type
        $types = Type::all();
        // ottengo tutte le technology
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $validatedData = $request->validated();
        $validatedData['slug'] = Helper::generateSlug($validatedData['name'], Project::class);

        if ($request->hasFile('path_image')) {
            // Elimina l'immagine precedente se presente
            if ($project->path_image) {
                Storage::delete($project->path_image);
            }

            $image_path = Storage::put('uploads', $validatedData['path_image']);
            $original_name = $request->file('path_image')->getClientOriginalName();

            $validatedData['path_image'] = $image_path;
            $validatedData['image_original_name'] = $original_name;
        }

        $project->update($validatedData);

        // Aggiorna le tecnologie selezionate
        if (!empty($request->technologies)) {
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.index')->with('success', 'Progetto aggiornato con successo!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato con successo!');
    }
}
