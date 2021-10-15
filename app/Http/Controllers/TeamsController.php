<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::get();

        return view('teams.index', compact('teams')); 
    }

    public function show(Team $team)
    {
        $team->load(['players']);
        
        return view('teams.show', compact('team'));
    }
}   
