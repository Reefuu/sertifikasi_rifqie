<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Members;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("members.index", [
            "headtitle" => "Members",
            "members" => Members::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("members.store", [
            "headtitle" => "Add Member",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required|string|max:255|regex:/\S/",
        ]);
        Members::create($request->all());

        return redirect("/members")->with('success', 'Member Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Members::findOrFail($id);
        $books = Books::where('member_id', $member->id)->get()->all();
        return view("members.show", [
            "member" => $member,
            "books" => $books,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Members::findOrFail($id);
        return view("members.update", [
            "headtitle" => "Edit Member",
            "member" => $member,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|regex:/\S/' . $id,
        ]);

        $member = Members::findOrFail($id);
        $member->update($request->all());

        return redirect("/members")->with('success', 'Member updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Members::findOrFail($id);
        $member->delete();

        return redirect("/members")->with('success', 'Member deleted successfully.');

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