<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $author = new Author();
        return view('author.create', compact('author'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|string',
            'address' => 'required|min:7|string',
            'phonenum' => 'required|min:7|Numeric',
            'email' => 'required|string|email|unique:users,email',
        ]);

        $author = new Author();
        $author ->fill($request->all());
        $author ->save();

        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('author.create', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $this->validate($request, [
            'name' => 'required|min:5|string',
            'address' => 'required|min:7|Numeric',
            'phonenum' => 'required|min:7|Numeric',
            'email' => 'required|string|email|unique:users,email',
        ]);
        $author ->fill($request->all());
        $author ->save();

        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('author.index');
    }
}
