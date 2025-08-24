<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
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
    public function store(StoreContactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $contact = Contact::first();
        if (!$contact) {
            return redirect('/back')->with('error', 'Contact information not found!');
        }
        return view('back-end.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'street' => 'required|string|max:255',
            'number' => 'required|string|max:50',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $contact->update([
            'street' => $request->street,
            'number' => $request->number,
            'city' => $request->city,
            'zip' => $request->zip,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect('/back')->with('success', 'Contact information updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
