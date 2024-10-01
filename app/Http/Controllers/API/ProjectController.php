<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;


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



        $successes = true;

        $response = [
            'successes' =>  $successes,
            'results' => $projects
        ];

        return response()->json($response);
    }


    public function projectBySlug($slug)
    {
        // Recupera il progetto con le relazioni `type` e `technologies`
        $project = Project::with(['type', 'technologies'])->where('slug', $slug)->first();

        if (!$project) {
            return response()->json(['successes' => false, 'message' => 'Project not found'], 404);
        }

        return response()->json(['successes' => true, 'project' => $project]);
    }
}
