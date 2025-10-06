<?php

namespace App\Http\Controllers;

use App\Models\Parcelle;
use Illuminate\Http\Request;

class ParcelleController extends Controller
{
    public function index()
    {
        $parcelles = Parcelle::latest()->paginate(10);
        return view('parcelles.index', compact('parcelles'));
    }

    public function create()
    {
        return view('parcelles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero_police' => 'required|string|max:100',
            'superficie' => 'required|numeric',
            'ville' => 'required|string|max:100',
            'lotissement' => 'nullable|string|max:100',
            'coordonnees' => 'nullable|string|max:255',
        ]);

        Parcelle::create($request->all());
        return redirect()->route('parcelles.index')->with('success', 'Parcelle ajoutée avec succès.');
    }

    public function show(Parcelle $parcelle)
    {
        return view('parcelles.show', compact('parcelle'));
    }

    public function edit(Parcelle $parcelle)
    {
        return view('parcelles.edit', compact('parcelle'));
    }

    public function update(Request $request, Parcelle $parcelle)
    {
        $request->validate([
            'numero_police' => 'required|string|max:100',
        ]);

        $parcelle->update($request->all());
        return redirect()->route('parcelles.index')->with('success', 'Parcelle mise à jour.');
    }

    public function destroy(Parcelle $parcelle)
    {
        $parcelle->delete();
        return redirect()->route('parcelles.index')->with('success', 'Parcelle supprimée.');
    }
}
