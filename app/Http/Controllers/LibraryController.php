<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Members;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index(){
        $books = Books::with(relations: 'categories')->get();
        $members = Members::all();

        return view("index",[
            "headtitle" => "Library",
            "books"=> $books,
            "members"=> $members,
        ]);
    }

    public function borrow(Request $request, $id)
    {
        $book = Books::findOrFail($id);
        $member = Members::findOrFail(id: $request->member_id);

        $book->member_id = $member->id;
        $book->save();

        return redirect('/')->with('success', 'Book borrowed successfully.');
    }
    public function return($id)
    {
        $book = Books::findOrFail($id);
        $book->member_id = null;
        $book->save();

        return redirect('/')->with('success', 'Book returned successfully.');
    }
}
