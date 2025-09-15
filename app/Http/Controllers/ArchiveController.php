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
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            // Vérifier la nomenclature : exactement 3 mots
            $parts = preg_split('/\s+/', trim($filename));

            if (count($parts) !== 3) {
                return response()->json([
                    'error' => "❌ Le fichier doit respecter la nomenclature : Titre Catégorie Service"
                ], 422);
            }

            // Si valide → enregistrer le fichier
            $path = $file->store('archives', 'public');

            // Sauvegarde en base
            \App\Models\Archive::create([
                'titre'     => $parts[0],
                'categorie' => $parts[1],
                'service'   => $parts[2],
                'fichier'   => $path,
            ]);

            return response()->json(['success' => "✅ Fichier bien enregistré !"]);
        }

        return response()->json(['error' => 'Aucun fichier reçu.'], 400);
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
