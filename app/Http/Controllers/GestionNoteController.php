<?php

namespace App\Http\Controllers;

use App\GroupeMatiere;
use App\Matiere;
use App\Note;
use App\Promotion;
use Illuminate\Http\Request;

class GestionNoteController extends Controller
{
    function index(){
        return view("management.note.index")->with("promotions", Promotion::all());
    }
    function note(Request $request){
        return view("management.note.note")->with("promotion", Promotion::find($request->selector));
    }
    function add_note($id){
        return view("management.note.create")->with("matiere", Matiere::find($id));
    }
    function create(Request $request){
        $matiere = Matiere::find($request->matiere);
        foreach ($matiere->promotion->eleves as $eleve){
            $note = new Note();
            $note->note = $request->input("note_".$eleve->id);
            $note->eleve_id = $eleve->id;
            $note->matiere_id = $request->matiere;
            $note->periode_id = $request->input("periode");
            $note->coefficient = $request->input("coef");
            $note->description = $request->input("description");
            $note->save();
        }
        return $this->index();
    }
}
