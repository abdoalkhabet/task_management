<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsersByRole = DB::table('users')
            ->select('role', DB::raw('count(*) as count'))
            ->groupBy('role')
            ->get();

        $totalTasksByStatus = DB::table('tasks')
            ->select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();

        $totalTasksByPriority = DB::table('tasks')
            ->select('priority', DB::raw('count(*) as count'))
            ->groupBy('priority')
            ->get();

        return view('dashboard.index', compact(
            'totalUsersByRole',
            'totalTasksByStatus',
            'totalTasksByPriority'
        ));
    }
}
