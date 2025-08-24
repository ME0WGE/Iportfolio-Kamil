<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy('id')->get();
        return view('back-end.portfolio.index', compact('portfolios'));
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
            'filter' => 'required|string|in:app,product,branding,books',
        ]);

        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('portfolio', 'public');
            
            Portfolio::create([
                'img' => $imagePath,
                'filter' => $request->filter,
            ]);

            return redirect()->back()->with('success', 'Portfolio item added successfully!');
        }

        return redirect()->back()->with('error', 'Image upload failed!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'filter' => 'required|string|in:app,product,branding,books',
        ]);

        $data = ['filter' => $request->filter];

        if ($request->hasFile('img')) {
            // Delete old image
            if ($portfolio->img && Storage::disk('public')->exists($portfolio->img)) {
                Storage::disk('public')->delete($portfolio->img);
            }
            
            // Store new image
            $imagePath = $request->file('img')->store('portfolio', 'public');
            $data['img'] = $imagePath;
        }

        $portfolio->update($data);

        return redirect()->back()->with('success', 'Portfolio item updated successfully!');
    }

    /**
     * Remove the specified resource in storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        // Delete image file
        if ($portfolio->img && Storage::disk('public')->exists($portfolio->img)) {
            Storage::disk('public')->delete($portfolio->img);
        }
        
        $portfolio->delete();
        return redirect()->back()->with('success', 'Portfolio item deleted successfully!');
    }
}
