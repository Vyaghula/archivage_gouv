<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Statistiques globales
        $totalArchives = Archive::count();
        $archivesToday = Archive::whereDate('created_at', today())->count();
        $archivesThisMonth = Archive::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // Statistiques par mois (12 derniers mois)
        $archivesByMonth = Archive::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->pluck('count', 'month');

        // Statistiques par service
        $archivesByService = Archive::select('service', DB::raw('COUNT(*) as count'))
            ->groupBy('service')
            ->pluck('count', 'service');

        // Statistiques par catégorie
        $archivesByCategorie = Archive::select('categorie', DB::raw('COUNT(*) as count'))
            ->groupBy('categorie')
            ->pluck('count', 'categorie');

        return view('dashboard.index', compact(
            'totalArchives',
            'archivesToday',
            'archivesThisMonth',
            'archivesByMonth',
            'archivesByService',
            'archivesByCategorie'
        ));
    }
}
