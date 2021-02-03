<?php

namespace App\Http\Controllers;

use App\GroupeMatiere;
use App\Matiere;
use App\Note;
use App\Eleve;
use App\Promotion;
use Illuminate\Http\Request;
use Mockery\Matcher\Not;

class GestionNoteController extends Controller
{
    function index()
    {
        return view("management.note.index")->with("promotions", Promotion::all());
    }
    function note(Request $request)
    {
        return view("management.note.note")->with("promotion", Promotion::find($request->selector));
    }
    function add_note($id)
    {
        return view("management.note.create")->with("matiere", Matiere::find($id));
    }
    function create(Request $request)
    {
        $matiere = Matiere::find($request->matiere);
        foreach ($matiere->promotion->eleves as $eleve) {
            if ($request->input("note_" . $eleve->id)) {
                $note = new Note();
                $note->note = $request->input("note_" . $eleve->id);
                $note->eleve_id = $eleve->id;
                $note->matiere_id = $request->matiere;
                $note->periode_id = $request->input("periode");
                $note->type = $request->input("type");
                $note->coefficient = $request->input("coef");
                $note->description = $request->input("description");
                $note->save();
            }
        }
        return $this->index();
    }
    function edit_note($id)
    {
        //$note = Note::with('eleve')->where('matiere_id', $id)->get();

        return view("management.note.edit")->with("matiere", Matiere::find($id));
    }
    function show_note($id)
    {
        $notes = Note::with('eleve')->where('matiere_id', $id)->get();
        //dd($eleves);
        return view("management.note.note_matiere")->with("matiere", Matiere::find($id))->with("notes", $notes);
    }
    function update(Request $request)
    {
        $note = Note::Find($request->id_note);
        $note->note = $request->note;
        $note->update();
        return $this . $this->index();
    }
    function destroy(Request $request)
    {
        $note = Note::find($request->id_note_destroy);
        $note->delete();
        return $this->index();
    }
}
