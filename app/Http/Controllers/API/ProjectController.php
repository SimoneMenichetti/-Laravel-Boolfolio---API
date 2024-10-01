<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Restituisce la lista dei progetti in formato JSON con un messaggio di successo.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $projects = Project::with(['type', 'technologies'])->paginate(20);

        // restituisco la lista di tutti i Type in Json con messaggio successo

        $types = Type::select('id', 'name', 'slug', 'description')->get();



        $successes = true;

        $response = [
            'successes' =>  $successes,
            'results' => $projects,
            'types' => $types
        ];

        return response()->json($response);
    }


    public function projectBySlug($slug)
    {
        // Recupera il progetto con le relazioni `type` e `technologies`
        $project = Project::with(['type', 'technologies'])->where('slug', $slug)->first();

        if (!$project) {
            return response()->json(['successes' => false, 'message' => 'Project non trovato'], 404);
        }

        return response()->json(['successes' => true, 'project' => $project]);
    }

    // types slug


    public function typeBySlug($slug)
    {
        // Recupera il progetto con le relazioni `type` e `technologies`
        $type = Type::where('slug', $slug)->first();

        if (!$type) {
            return response()->json(['successes' => false, 'message' => 'type non trovato'], 404);
        }

        return response()->json(['successes' => true, 'project' => $type]);
    }
}
