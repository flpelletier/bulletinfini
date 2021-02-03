<?php

namespace App\Http\Controllers;

use App\Moyenne;
use App\Periode;
use App\Promotion;
use Illuminate\Http\Request;

class GestionBulletinController extends Controller
{
    function index()
    {

        return view("management.bulletin.index")->with("promotions", Promotion::all());
    }

    function bulletin(Request $request)
    {
        return view("management.bulletin.bulletin")->with("promotion", Promotion::find($request->selector));
    }

    function add_bulletin($id)
    {
        return view("management.bulletin.create")->with("periode", Periode::find($id));
    }

    function create(Request $request)
    {
        //generatioon du pdf
        $periode = Periode::find($request->input("periode"));
        foreach ($periode->promotion->eleves as $eleve) {
            if ($request->input($eleve->id) != null) {
                foreach ($periode->promotion->matieres as $matiere) {
                    if($eleve->notes->where('matiere_id', $matiere->id)->count() > 0) {
                        $number = 0;
                        $total = 0;
                        foreach ($eleve->notes->where('matiere_id', $matiere->id) as $note) {
                            $total += $note->note * $note->coefficient;
                            $number += $note->coefficient;
                        }
                        $m = Moyenne::all()->where("eleve_id",$eleve->id)->where("matiere_id",$matiere->id)->where("periode_id",$periode->id);
                        if($m->count() == 0){
                            $moyenne = new Moyenne();
                            $moyenne->note = $total/$number;
                            $moyenne->periode_id = $periode->id;
                            $moyenne->eleve_id = $eleve->id;
                            $moyenne->matiere_id = $matiere->id;
                            $moyenne->save();
                        }else{
                            $m[0]->note = $total/$number;
                            $m[0]->update();
                        }
                    }
                }
            }
        }
    }
}
