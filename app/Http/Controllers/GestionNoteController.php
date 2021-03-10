<?php

namespace App\Http\Controllers;

use App\GroupeMatiere;
use App\Matiere;
use App\MatieresCertification;
use App\Note;
use App\Eleve;
use App\NotesCertification;
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

        $promotion = Promotion::find($request->selector);
        $certif_matiere = MatieresCertification::all();

        return view("management.note.note", compact("promotion", "certif_matiere"));
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
        $note->note = $request->input("note");
        $note->update();
        return $this->index();
    }

    function destroy(Request $request)
    {
        $note = Note::find($request->id_note_destroy);
        $note->delete();
        return $this->index();
    }

    function certif_note(Request $request)
    {

        $promotion = Promotion::find($request->selector);
        $certif_matiere = MatieresCertification::all();

        return view("management.note.note", compact("promotion", "certif_matiere"));
    }

    function add_certif_note(Request $request, $id)
    {
        $promotion = Promotion::find($request->input("promo"));
        $matiere = MatieresCertification::find($id);
        return view("management.note.create", compact("matiere", "promotion"));
    }

    function certif_create(Request $request)
    {
        $matiere = Matiere::find($request->matiere);
        foreach ($matiere->promotion->eleves as $eleve) {
            if ($request->input("note_" . $eleve->id)) {
                $note = new NotesCertification();
                $note->note = $request->input("note_" . $eleve->id);
                $note->eleve_id = $eleve->id;
                $note->matiere_id = $request->matiere;
                $note->coefficient = $request->input("coef");
                $note->descritpion = $request->input("description");
                $note->save();
            }
        }
        return $this->index();
    }

    function edit_certif_note($id)
    {
        $matiere = MatieresCertification::find($id);
        $eleves = Eleve::all();
        $meseleves = array();
        foreach ($eleves as $eleve) {
            if ($eleve->certif_notes->count() > 0) {
                array_push($meseleves, $eleve);
            }
        }
        return view("management.note.edit", compact("matiere", "meseleves"));

    }

    function show_certif_note($id)
    {
        $notes = Note::with('eleve')->where('matiere_id', $id)->get();
        return view("management.note.note_matiere")->with("matiere", Matiere::find($id))->with("notes", $notes);
    }

    function certif_update(Request $request)
    {
        $note = NotesCertification::Find($request->id_note);
        $note->note = $request->input("note");
        $note->update();
        return $this->index();
    }

    function certif_destroy(Request $request)
    {
        $note = Note::find($request->id_note_destroy);
        $note->delete();
        return $this->index();
    }
}
