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
}
