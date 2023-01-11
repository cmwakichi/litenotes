<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashedNoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', '=', Auth::id())->onlyTrashed()->latest('deleted_at')->paginate(10);

        return view('notes.index')->with('notes', $notes);
    }
}
