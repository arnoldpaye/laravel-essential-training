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
        // $notes = Note::where('user_id', $user_id)->latest()->get(); // latest created
        $notes = Note::where('user_id', $user_id)->latest('updated_at')->get();
        /* $notes->each(function($note) {
            dump($note->title);
        }); */
    }
}
