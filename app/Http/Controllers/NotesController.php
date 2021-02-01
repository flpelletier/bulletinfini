<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index()
    {
        $note = Note::all();
        return view('notes.index', compact('note'));
    }
}
