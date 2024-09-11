<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('pages.category.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $category = Category::create([
            'name' => $request->name,
        ]);

        session()->flash('success', 'Category created successfully');
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('pages.category.edit', compact('category'));
    }

    public function update(Category $category, Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        session()->flash('success', 'Category updated successfully');
        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success', 'Category deleted successfully');
        return redirect()->route('category.index');
    }
}
