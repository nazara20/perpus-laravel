<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();

        return view('pages.facility.index', compact('facilities'));
    }

    public function create()
    {
        return view('pages.facility.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'quantity' => ['required'],
        ]);

        $facility = Facility::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
        ]);

        session()->flash('success', 'Facility created successfully');
        return redirect()->route('facility.index');
    }

    public function edit(Facility $facility)
    {
        return view('pages.facility.edit', compact('facility'));
    }

    public function update(Facility $facility, Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'quantity' => ['required'],
        ]);

        $facility->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
        ]);

        session()->flash('success', 'Facility updated successfully');
        return redirect()->route('facility.index');
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();

        session()->flash('success', 'Facility deleted successfully');
        return redirect()->route('facility.index');
    }
}
