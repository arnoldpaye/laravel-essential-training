<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /*
    * Display a listing of the resource.
    */
    public function index()
    {
        $user_id = Auth::id();
        $notes = Note::where('user_id', $user_id)->latest('updated_at')->paginate(5);
        return view('notes.index')->with('notes', $notes);
    }

    /*
    * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('notes.create');
    }

    /*
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:120',
            'text' => 'required'
        ]);
        
        $note = new Note([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'text' => $request->text,
        ]);
        $note->save();
    }
}
