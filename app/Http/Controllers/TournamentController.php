<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tournaments = Tournament::all();
        return view('tournaments.index', compact('tournaments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizations = \App\Models\Organization::all(); 
        return view('tournaments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'organization_id' => 'required|exists:organizations,id',
        ]);

        Tournament::create($validated);
        return redirect()->route('tournaments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournament $tournament)
    {
        return view('tournaments.show', compact('tournament'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournament $tournament)
    {
        return view('tournaments.edit', compact('tournament'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tournament $tournament)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'organization_id' => 'required|exists:organizations,id',
        ]);

        $tournament->update($validated);
        return redirect()->route('tournaments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournament $tournament)
    {
        $tournament->delete();
        return redirect()->route('tournaments.index');
    }
}
