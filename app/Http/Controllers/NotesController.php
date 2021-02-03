<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Prof;
use App\Periode;
use App\Matiere;
use App\Eleve;
use Validator;

class NotesController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }
    public function create()
    {
        $periodes = Periode::all();
        $eleves = Eleve::all();
        $matieres = Matiere::all();
        $professeurs  = Prof::all();

        return view('notes.create', compact('periodes', 'eleves', 'matieres', 'professeurs'));
    }
    public function show($id)
    {
        $note = Note::find($id);
        return view('notes.show', compact('note'));
    }
    public function edit($id)
    {
        $note = Note::find($id);

        $periodes = Periode::all();
        $eleves = Eleve::all();
        $matieres = Matiere::all();
        $professeurs  = Prof::all();

        return view('notes.edit', compact('note', 'periodes', 'eleves', 'matieres', 'professeurs'));
    }
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'note' => 'required',
            'coefficient' => 'required',
            'matiere' => 'required',
            'eleve' => 'required',
            'periode' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->route("notes.create")->withErrors($validator)->withInput();
        }

        $note = new Note();

        $note->note = $request->input('note');
        $note->description = $request->input('description');
        $note->type = $request->input('type');
        $note->coefficient = $request->input('coefficient');
        $note->matiere_id = $request->input('matiere');
        $note->eleve_id = $request->input('eleve');
        $note->periode_id = $request->input('periode');

        $note->save();

        return redirect()->route("notes.index")->with('success', 'Note créée !');
    }
    public function update(Request $request, $id)
    {
        $note = Note::find($id);
        $validator = Validator::make($request->all(), [
            'note' => 'required',
            'coefficient' => 'required',
            'matiere' => 'required',
            'eleve' => 'required',
            'periode' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route("notes.edit", $id)->withErrors($validator)->withInput();
        }

        $note->note = $request->input('note');
        $note->type = $request->input('type');
        $note->description = $request->input('description');
        $note->coefficient = $request->input('coefficient');
        $note->matiere_id = $request->input('matiere');
        $note->eleve_id = $request->input('eleve');
        $note->periode_id = $request->input('periode');
        $note->updated_at = now();

        $note->save();

        return redirect()->route("notes.index")->with('success', 'Note mise à jour !');
    }
    public function destroy($id)
    {
        $note = Note::find($id);

        $note->delete();

        return redirect()->route("notes.index")->with('error', 'Note supprimée avec succès !');
    }
}
