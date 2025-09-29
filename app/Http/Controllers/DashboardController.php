<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $pendudukController = new PendudukController();
        $statistics = $pendudukController->getStatistics();

        return Inertia::render('Dashboard', [
            'statistics' => $statistics
        ]);
    }
}
