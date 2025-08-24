<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreAboutRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $about = About::with('avatar')->first();
        if (!$about) {
            return redirect('/back')->with('error', 'About information not found!');
        }
        return view('back-end.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'website' => 'required|url|max:255',
            'phone' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'age' => 'required|integer|min:0|max:120',
            'degree' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'freelance' => 'required|string|in:Available,Not Available,Part-time',
            'subtext' => 'required|string|max:1000',
        ]);

        $about->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'subtitle' => $request->subtitle,
            'birthdate' => $request->birthdate,
            'website' => $request->website,
            'phone' => $request->phone,
            'city' => $request->city,
            'age' => $request->age,
            'degree' => $request->degree,
            'email' => $request->email,
            'freelance' => $request->freelance,
            'subtext' => $request->subtext,
        ]);

        return redirect('/back')->with('success', 'About information updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
