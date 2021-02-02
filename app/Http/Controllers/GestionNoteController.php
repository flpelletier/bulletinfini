<?php

namespace App\Http\Controllers;

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
}
