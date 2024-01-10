<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $authors = Author::all();
        return view('book.index', compact('books','authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = new Book();
        $author = Author::all();
        return view('book.create', compact('book','author'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|string',
            'isbn' => 'required|min:7|Numeric',
            'price' => 'required|min:7|Numeric',
            'numpages' => 'required|min:2|Numeric',
        ]);

        $book = new Book();
        $book ->fill($request->all());
        $book->authorid = $request['authorid'];
        $book ->save();

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $author = Author::all();
        return view('book.create', compact('book','author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'title' => 'required|min:5|string',
            'isbn' => 'required|min:7|Numeric',
            'price' => 'required|min:7|Numeric',
            'numpages' => 'required|min:1|Numeric'
        ]);
        $book ->fill($request->all());
        
        $book ->save();
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }
}
