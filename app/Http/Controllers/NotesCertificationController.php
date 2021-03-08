<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NotesCertification;
use App\Prof;
use App\Periode;
use App\Matiere;
use App\Eleve;
use Validator;
use Illuminate\Support\Facades\DB;

class NotesCertificationController extends Controller
{
    public function index()
    {
        $notes = NotesCertification::all();
        return view('notescertification.index', compact('notes'));
    }
    public function create()
    {
        return view('notescertification.create');
    }
    public function show($id)
    {
        $note = NotesCertification::find($id);
        return view('notescertification.show', compact('note'));
    }
    public function edit($id)
    {
        $note = NotesCertification::find($id);

        return view('notescertification.edit', compact('note'));
    }
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'coefficient' => 'required',
            'matiere' => 'required',
            'type' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route("notescertification.create")->withErrors($validator)->withInput();
        }

        $note = new NotesCertification();

        $note->coefficient = $request->input('coefficient');
        $note->matiere = $request->input('matiere');
        $note->type = $request->input('type');

        $note->save();

        return redirect()->route("notescertification.index")->with('success', 'Matière créée !');
    }
    public function update(Request $request, $id)
    {
        $note = NotesCertification::find($id);
        $validator = Validator::make($request->all(), [
            'coefficient' => 'required',
            'matiere' => 'required',
            'type' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route("notescertification.edit", $id)->withErrors($validator)->withInput();
        }

        $note->matiere = $request->input('matiere');
        $note->coefficient = $request->input('coefficient');
        $note->type = $request->input('type');

        $note->updated_at = now();

        $note->save();

        return redirect()->route("notescertification.index")->with('success', 'Matière mise à jour !');
    }
    public function destroy($id)
    {
        $note = NotesCertification::find($id);

        $note->delete();

        return redirect()->route("notescertification.index")->with('error', 'Matière supprimée avec succès !');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("notes_certifications")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Matière(s) supprimé(s) avec succès."]);
    }
}
