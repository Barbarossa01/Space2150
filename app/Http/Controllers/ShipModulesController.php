<?php

namespace App\Http\Controllers;

use App\Models\ShipModules;
use Illuminate\Http\Request;

class ShipModulesController extends Controller
{
    public function index()
    {
        $ship_modules = ShipModules::all();
        return view('shipmodules.list', compact('ship_modules'));
    }

    public function create()
    {
        return view('shipmodules.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'module_name' => 'required|min:3|max:25|unique:ship_modules,module_name',
            'is_workable' => 'required|boolean',
        ]);

        ShipModules::create($validatedData);

        return redirect()->route('shipmodules.index')->with('success', 'Ship module added successfully!');
    }

    public function edit($id)
    {
        $shipmodule = ShipModules::find($id);

        if (!$shipmodule) {
            return redirect()->route('shipmodules.index')->with('error', 'Ship module not found.');
        }

        return view('shipmodules.edit', compact('shipmodule'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'module_name' => 'required|min:3|max:25|unique:ship_modules,module_name,' . $id,
            'is_workable' => 'required|boolean',
        ]);

        $shipmodule = ShipModules::find($id);

        if (!$shipmodule) {
            return redirect()->route('shipmodules.index')->with('error', 'Ship module not found.');
        }

        $shipmodule->update($validatedData);

        return redirect()->route('shipmodules.index')->with('success', 'Ship module updated successfully!');
    }
    
    
    
    public function destroy($id)
    {
        $shipmodule = ShipModules::find($id);

        if (!$shipmodule) {
            return redirect()->route('shipmodules.index')->with('error', 'Ship module not found.');
        }

        $shipmodule->delete();

        return redirect()->route('shipmodules.index')->with('success', 'Ship module deleted successfully!');
    }





    public function show($id)
{
    $shipmodule = ShipModules::find($id);

    if (!$shipmodule) {
        return redirect()->route('shipmodules.index')->with('error', 'Ship module not found.');
    }

    return view('shipmodules.show', compact('shipmodule'));
}


}
