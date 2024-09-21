<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCode;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('pages.book.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('pages.book.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['required'],
            'code' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'year' => ['required'],
            'publisher' => ['required'],
        ]);

        $code = BookCode::create([
            'code' => $request->code,
        ]);

        $book = Book::create([
            'category_id' => $request->category_id,
            'book_code_id' => $code->id,
            'title' => $request->title,
            'description' => $request->description,
            'year' => $request->year,
            'publisher' => $request->publisher,
        ]);
        

        session()->flash('success', 'Book created successfully');
        return redirect()->route('book.index');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();

        return view('pages.book.edit', compact('book', 'categories'));
    }

    public function update(Book $book, Request $request)
    {
        $request->validate([
            'category_id' => ['required'],
            'code' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'year' => ['required'],
            'publisher' => ['required'],
        ]);

        $code = BookCode::updateOrcreate([
            'code' => $request->code,
        ]);

        $book->update([
            'category_id' => $request->category_id,
            'book_code_id' => $code->id,
            'title' => $request->title,
            'description' => $request->description,
            'year' => $request->year,
            'publisher' => $request->publisher,
        ]);

        session()->flash('success', 'Book updated successfully');
        return redirect()->route('book.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        session()->flash('success', 'Book deleted successfully');
        return redirect()->route('book.index');
    }
}
