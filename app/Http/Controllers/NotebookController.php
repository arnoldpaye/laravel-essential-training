<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NotebookController extends Controller
{
    /*
    * Display a listing of the resource.
    */
    public function index()
    {
        $user_id = Auth::id();
        $notebooks = Notebook::where('user_id', $user_id)->latest('updated_at')->get();
        return view('notebooks.index')->with('notebooks', $notebooks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notebooks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $notebook = new Notebook([
            'user_id' => Auth::id(),
            'uuid' => Str::uuid(),
            'name' => $request->name,
        ]);
        $notebook->save();

        return to_route('notebooks.index');
    }

    public function show(Notebook $notebook) {}
}
