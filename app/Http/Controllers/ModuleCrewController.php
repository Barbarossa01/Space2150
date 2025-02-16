<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleCrew; // Import the ModuleCrew model
use App\Models\ShipModules; // Import the ShipModules model

class ModuleCrewController extends Controller
{

    public function index()
    {
        $moduleCrews = ModuleCrew::all();

        return view('modulecrew.index', compact('moduleCrews'));
    }


    public function create()
    {
        $shipModules = ShipModules::all();

        return view('modulecrew.create', compact('shipModules'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'ship_module_id' => 'required|exists:ship_modules,id',
            'nick' => 'required|min:3|max:10|unique:module_crew,nick',
            'gender' => 'required|in:F,M,N',
            'age' => 'required|integer|min:18|max:85',
        ]);

        ModuleCrew::create($validated);

        return redirect()->route('modulecrew.index')->with('success', 'Crew member added successfully!');
    }



    public function edit($id)
{
    $moduleCrew = ModuleCrew::findOrFail($id);

    $shipModules = ShipModules::all();

    return view('modulecrew.edit', compact('moduleCrew', 'shipModules'));
}



public function update(Request $request, $id)
{
    $validated = $request->validate([
        'ship_module_id' => 'required|exists:ship_modules,id',
        'nick' => "required|min:3|max:10|unique:module_crew,nick,$id",
        'gender' => 'required|in:F,M,N',
        'age' => 'required|integer|min:18|max:85',
    ]);

    $moduleCrew = ModuleCrew::findOrFail($id);

    $moduleCrew->update($validated);

    return redirect()->route('modulecrew.index')->with('success', 'Crew member updated successfully!');
}




public function destroy($id)
{
    $moduleCrew = ModuleCrew::findOrFail($id);

    $moduleCrew->crewSkills()->delete();

    $moduleCrew->delete();

    return redirect()->route('modulecrew.index')->with('success', 'Crew member deleted successfully!');
}


    // Other methods...




}
