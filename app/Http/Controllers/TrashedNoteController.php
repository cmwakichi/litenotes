<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashedNoteController extends Controller
{
    public function index()
    {
        $trashednotes = Note::where('user_id', '=', Auth::id())->onlyTrashed()->latest('deteted_at')->paginate(10)->get();

        return view('trash.index')->with('trashednotes', $trashednotes);
    }
}
