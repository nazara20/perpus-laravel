<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index()
    {
        $visits = Visit::all();

        return view('pages.visit.index', compact('visits'));
    }

    public function create()
    {
        return view('pages.visit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'date' => ['required'],
            'agency' => ['required'],
            'phone' => ['required'],
        ]);

        $visit = Visit::create([
            'name' => $request->name,
            'date' => $request->date,
            'agency' => $request->agency,
            'phone' => $request->phone,
        ]);

        session()->flash('success', 'Visit created successfully');
        return redirect()->route('visit.index');
    }

    public function edit(Visit $visit)
    {
        return view('pages.visit.edit', compact('visit'));
    }

    public function update(Visit $visit, Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'date' => ['required'],
            'agency' => ['required'],
            'phone' => ['required'],
        ]);

        $visit->update([
            'name' => $request->name,
            'date' => $request->date,
            'agency' => $request->agency,
            'phone' => $request->phone,
        ]);

        session()->flash('success', 'Visit updated successfully');
        return redirect()->route('visit.index');
    }

    public function destroy(Visit $visit)
    {
        $visit->delete();

        session()->flash('success', 'Visit deleted successfully');
        return redirect()->route('visit.index');
    }
}
