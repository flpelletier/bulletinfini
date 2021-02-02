<?php

namespace App\Http\Controllers;

use App\GroupeMatiere;
use App\Matiere;
use App\Promotion;
use Illuminate\Http\Request;

class GestionNoteController extends Controller
{
    function index(){
        $matier = Matiere::all();
        $gm = GroupeMatiere::all();
        // dd($gm[0]->matieres);
        dd($matier[0]->groupe_matiere);
        return view("management.note.index")->with("promotions", Promotion::all());
    }
    function note(Request $request){

        return view("management.note.note")->with("promotion", Promotion::find($request->selector));
    }
}
