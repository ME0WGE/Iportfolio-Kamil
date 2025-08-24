<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('id')->get();
        return view('back-end.testimonials.index', compact('testimonials'));
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
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'comment' => 'required|string|max:1000',
        ]);

        if ($request->hasFile('img')) {
            $imagePath = 'storage/' . $request->file('img')->store('assets', 'public');
            
            Testimonial::create([
                'img' => $imagePath,
                'name' => $request->name,
                'position' => $request->position,
                'comment' => $request->comment,
            ]);

            return redirect()->back()->with('success', 'Testimonial added successfully!');
        }

        return redirect()->back()->with('error', 'Image upload failed!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'comment' => 'required|string|max:1000',
        ]);

        $data = [
            'name' => $request->name,
            'position' => $request->position,
            'comment' => $request->comment,
        ];

        if ($request->hasFile('img')) {
            // Delete old image
            if ($testimonial->img && Storage::disk('public')->exists($testimonial->img)) {
                Storage::disk('public')->delete($testimonial->img);
            }
            
            // Store new image
            $imagePath = 'storage/' . $request->file('img')->store('assets', 'public');
            $data['img'] = $imagePath;
        }

        $testimonial->update($data);

        return redirect()->back()->with('success', 'Testimonial updated successfully!');
    }

    /**
     * Remove the specified resource in storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        // Delete image file
        if ($testimonial->img && Storage::disk('public')->exists($testimonial->img)) {
            Storage::disk('public')->delete($testimonial->img);
        }
        
        $testimonial->delete();
        return redirect()->back()->with('success', 'Testimonial deleted successfully!');
    }
}
