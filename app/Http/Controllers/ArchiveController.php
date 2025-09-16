<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Archive::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('titre', 'like', '%' . $request->search . '%')
                ->orWhere('categorie', 'like', '%' . $request->search . '%')
                ->orWhere('service', 'like', '%' . $request->search . '%');
        }

        $archives = $query->latest()->paginate(10);

        if ($request->ajax()) {
            return view('archives.partials.table', compact('archives'))->render();
        }

        return view('archives.index', compact('archives'));
    }



    /**
     * Upload a file (Dropzone).
     */

    public function upload(Request $request)
    {
        if (! $request->hasFile('file')) {
            return response()->json(['error' => 'Aucun fichier reçu.'], 400);
        }

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $baseName = pathinfo($originalName, PATHINFO_FILENAME);

        // Vérifier nomenclature : exactement 3 mots séparés par des espaces
        $parts = preg_split('/\s+/', trim($baseName));
        if (count($parts) !== 3) {
            // message clair renvoyé au client
            return response()->json([
                'error' => "Le document : {$originalName} est rejeté en raison de la nomenclature de son nom"
            ], 422);
        }

        // Optionnel : autres validations (taille, extension) déjà faites côté Dropzone
        $path = $file->store('archives', 'public');

        $archive = \App\Models\Archive::create([
            'titre'     => $parts[0],
            'categorie' => $parts[1],
            'service'   => $parts[2],
            'fichier'   => $path,
        ]);

        return response()->json(['success' => true, 'file' => $archive], 200);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('archives.create'); // ton fichier resources/views/archives/create.blade.php
    }


    // la methode show
    public function show(Archive $archive)
    {
        return view('archives.show', compact('archive'));
    }
}
