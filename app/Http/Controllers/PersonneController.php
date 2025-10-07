<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;

class PersonneController extends Controller
{
    public function index()
    {
        $personnes = Personne::latest()->paginate(10);
        return view('personnes.index', compact('personnes'));
    }

    public function create()
    {
        return view('personnes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'postnom' => 'nullable|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:50',
            'adresse' => 'nullable|string|max:255',
            'nationalite' => 'nullable|string|max:100',
            'genre' => 'required|in:M,F',
        ]);

        Personne::create($request->all());

        return redirect()->route('personnes.index')->with('success', 'Personne ajoutée avec succès.');
    }

    public function show(Personne $personne)
    {
        return view('personnes.show', compact('personne'));
    }

    public function edit(Personne $personne)
    {
        return view('personnes.edit', compact('personne'));
    }

    public function update(Request $request, Personne $personne)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'genre' => 'required|in:M,F',
        ]);

        $personne->update($request->all());
        return redirect()->route('personnes.index')->with('success', 'Personne mise à jour.');
    }

    public function destroy(Personne $personne)
    {
        $personne->delete();
        return redirect()->route('personnes.index')->with('success', 'Personne supprimée.');
    }

    /** 🔍 Recherche AJAX pour Select2 */
    public function search(Request $request)
    {
        $term = $request->get('term', '');

        $results = Personne::where('nom', 'like', "%{$term}%")
            ->orWhere('postnom', 'like', "%{$term}%")
            ->orWhere('prenom', 'like', "%{$term}%")
            ->limit(10)
            ->get(['id', 'nom', 'postnom', 'prenom']);

        $formatted = $results->map(function ($p) {
            return [
                'id' => $p->id,
                'text' => trim("{$p->nom} {$p->postnom} {$p->prenom}")
            ];
        });

        return response()->json($formatted);
    }
}
