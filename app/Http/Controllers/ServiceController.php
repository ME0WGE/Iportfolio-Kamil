<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('id')->get();
        return view('back-end.services.index', compact('services'));
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
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:1000',
        ]);

        Service::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'text' => $request->text,
        ]);

        return redirect()->back()->with('success', 'Service added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:1000',
        ]);

        $service->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'text' => $request->text,
        ]);

        return redirect()->back()->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource in storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back()->with('success', 'Service deleted successfully!');
    }
}
