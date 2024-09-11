<?php

namespace App\Http\Controllers;

use App\Models\Bookshelf;
use Illuminate\Http\Request;

class BookshelfController extends Controller
{
    public function index()
    {
        $bookshelfs = Bookshelf::all();

        return view('pages.bookshelf.index', compact('bookshelfs'));
    }

    public function create()
    {
        return view('pages.bookshelf.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'code' => ['required'],
           'name' => ['required'],
        ]);

        $bookshelf = Bookshelf::create([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        session()->flash('success', 'Bookshelf created successfully');
        return redirect()->route('bookshelf.index');
    }

    public function edit(Bookshelf $bookshelf)
    {
        return view('pages.bookshelf.edit', compact('bookshelf'));
    }

    public function update(Bookshelf $bookshelf, Request $request)
    {
        $request->validate([
           'code' => ['required'],
            'name' => ['required'],
        ]);

        $bookshelf->update([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        session()->flash('success', 'Bookshelf updated successfully');
        return redirect()->route('bookshelf.index');
    }

    public function destroy(Bookshelf $bookshelf)
    {
        $bookshelf->delete();

        session()->flash('success', 'Bookshelf deleted successfully');
        return redirect()->route('bookshelf.index');
    }
}
