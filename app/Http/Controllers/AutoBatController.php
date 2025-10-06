<?php

namespace App\Http\Controllers;

use App\Models\AutoBat;
use Illuminate\Http\Request;

class AutoBatController extends Controller
{
    public function index()
    {
        $autobats = AutoBat::latest()->paginate(10);
        return view('autobats.index', compact('autobats'));
    }

    public function create()
    {
        return view('autobats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_batiment' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:255',
        ]);

        AutoBat::create($request->all());
        return redirect()->route('autobats.index')->with('success', 'AutoBat ajouté.');
    }

    public function show(AutoBat $autobat)
    {
        return view('autobats.show', compact('autobat'));
    }

    public function edit(AutoBat $autobat)
    {
        return view('autobats.edit', compact('autobat'));
    }

    public function update(Request $request, AutoBat $autobat)
    {
        $request->validate([
            'nom_batiment' => 'required|string|max:255',
        ]);

        $autobat->update($request->all());
        return redirect()->route('autobats.index')->with('success', 'AutoBat mis à jour.');
    }

    public function destroy(AutoBat $autobat)
    {
        $autobat->delete();
        return redirect()->route('autobats.index')->with('success', 'AutoBat supprimé.');
    }
}
