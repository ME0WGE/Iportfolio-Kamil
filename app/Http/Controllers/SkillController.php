<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\Skill;
use App\Models\About;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::orderBy('id')->get();
        return view('back-end.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'skill' => 'required|string|max:255',
            'pourcentage' => 'required|integer|min:0|max:100',
        ]);

        Skill::create([
            'skill' => $request->skill,
            'pourcentage' => $request->pourcentage,
        ]);

        return redirect()->back()->with('success', 'Skill added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'skill' => 'required|string|max:255',
            'pourcentage' => 'required|integer|min:0|max:100',
        ]);

        $skill->update([
            'skill' => $request->skill,
            'pourcentage' => $request->pourcentage,
        ]);

        return redirect()->back()->with('success', 'Skill updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->back()->with('success', 'Skill deleted successfully!');
    }
}
