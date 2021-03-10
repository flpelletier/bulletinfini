<?php

namespace App\Http\Controllers;

use App\MatieresCertification;
use App\Moyenne;
use App\MoyenneCertification;
use Illuminate\Http\Request;
use App\Promotion;

class GestionCertificationController extends Controller
{
    function index()
    {

        return view("management.certification.index")->with("promotions", Promotion::all());
    }

    function bulletin(Request $request)
    {
        return view("management.certification.certification")->with("promotion", Promotion::find($request->selector));
    }
    function add_bulletin($id)
    {
        $promotion = Promotion::find($id);
        $matieres = MatieresCertification::all();
        return view("management.certification.create",compact("matieres", "promotion"));
    }
    function create(Request $request){
        $promotion = Promotion::find($request->input("promotion"));
        $matieres = MatieresCertification::all();
        foreach ($promotion->eleves as $eleve) {
            if ($request->input($eleve->id) != null) {
                foreach ($matieres as $matiere) {
                    if ($eleve->certif_notes->where('matiere_id', $matiere->id)->count() > 0) {
                        $number = 0;
                        $total = 0;
                        $numberc = 0;
                        $totalc = 0;
                        $numbere = 0;
                        $totale = 0;
                        foreach ($eleve->certif_notes->where('matiere_id', $matiere->id) as $note) {
                            $total += $note->note * $note->coefficient;
                            $number += $note->coefficient;
                            if ($note->type == "continue") {
                                $totalc += $note->note * $note->coefficient;
                                $numberc += $note->coefficient;
                            } else {
                                $totale += $note->note * $note->coefficient;
                                $numbere += $note->coefficient;
                            }
                        }

                        $d = MoyenneCertification::where("eleve_id", $eleve->id)->where("matiere_id", $matiere->id)->get();
                        dd($d);
                        try {
                            if ($d->count() == 0) {

                                $moyenne = new Moyenne();
                                $moyenne->note = $total / $number;
                                if ($numbere != 0) {
                                    $moyenne->exam = $totale / $numbere;
                                }
                                if ($numberc != 0) {
                                    $moyenne->continue = $totalc / $numberc;
                                }
                                $moyenne->remarque = $request->input("r_" . $eleve->id . "_" . $matiere->id);
                                $moyenne->periode_id = $periode->id;
                                $moyenne->eleve_id = $eleve->id;
                                $moyenne->matiere_id = $matiere->id;
                                $moyenne->save();

                            } else {
                                $d[0]->remarque = $request->input("r_" . $eleve->id . "_" . $matiere->id);
                                $d[0]->note = $total / $number;
                                $d[0]->save();
                            }
                        } catch (\Exception $e) {
                            echo $e;
                        }
                    }

                }


            }
        }
    }
}
