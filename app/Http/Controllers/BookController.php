<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Categories;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::with(relations: 'categories')->get();

        return view("books.index", [
            "headtitle" => "Books",
            "books" => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        if ($categories->isEmpty()) {
            return redirect('/books')->with('error', 'Cannot add book. No categories available.');
        }
        return view("books.store", [
            "headtitle" => "Add Book",
            "categories" => $categories,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|regex:/\S/',
            'author' => 'required|string|max:255|regex:/\S/',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $book = Books::create($request->only('title', 'author'));
        $book->categories()->sync($request->categories);

        return redirect('/books')->with('success', 'Book created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Books::findOrFail($id);
        $categories = Categories::all();
        return view("books.update", [
            "headtitle" => "Edit Book",
            "book" => $book,
            "categories" => $categories,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255|regex:/\S/',
            'author' => 'required|string|max:255|regex:/\S/',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $book = Books::findOrFail($id);
        $book->update($request->only('title', 'author'));
        $book->categories()->sync($request->categories);

        return redirect('/books')->with('success', 'Book updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Books::findOrFail($id);
        $book->delete();

        return redirect('\books')>with('success', 'Book deleted successfully.');

    }
}
