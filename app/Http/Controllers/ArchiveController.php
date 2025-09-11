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
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,jpg,png|max:20480',
        ]);

        $path = $request->file('file')->store('archives', 'public');

        $archive = Archive::create([
            'titre'   => $request->file('file')->getClientOriginalName(),
            'fichier' => $path,
            'categorie' => 'non spécifiée',
            'service' => 'non spécifié',
        ]);

        return response()->json(['success' => true, 'file' => $archive]);
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
