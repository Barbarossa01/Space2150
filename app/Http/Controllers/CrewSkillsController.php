<?php

namespace App\Http\Controllers;

use App\Models\CrewSkills;
use App\Models\ModuleCrew;
use Illuminate\Http\Request;

class CrewSkillsController extends Controller
{
    public function index()
    {
        $crewSkills = CrewSkills::all();
        return view('crewskills.index', compact('crewSkills'));
    }

    public function create()
    {
        $moduleCrews = ModuleCrew::all();
        return view('crewskills.create', compact('moduleCrews'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'module_crew_id' => 'required|exists:module_crew,id',
            'name' => 'required|min:3|max:15|unique:crew_skills,name',
        ]);

        CrewSkills::create($validated);
        return redirect()->route('crewskills.index')->with('success', 'Skill added successfully!');
    }

    public function edit($id)
    {
        $crewSkill = CrewSkills::findOrFail($id);
        $moduleCrews = ModuleCrew::all();
        return view('crewskills.edit', compact('crewSkill', 'moduleCrews'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'module_crew_id' => 'required|exists:module_crew,id',
            'name' => "required|min:3|max:15|unique:crew_skills,name,$id",
        ]);

        $crewSkill = CrewSkills::findOrFail($id);
        $crewSkill->update($validated);
        return redirect()->route('crewskills.index')->with('success', 'Skill updated successfully!');
    }

    public function destroy($id)
    {
        $crewSkill = CrewSkills::findOrFail($id);
        $crewSkill->delete();
        return redirect()->route('crewskills.index')->with('success', 'Skill deleted successfully!');
    }
}
