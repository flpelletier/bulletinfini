<?php

namespace App\Http\Controllers;

use App\GroupeMatiere;
use App\Matiere;
use App\Prof;
use App\Promotion;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class MatieresController extends Controller
{
    public function index()
    {
        $matieres = Matiere::all();
        return view('matieres.index', compact('matieres'));
    }
    public function show($id)
    {
        $matiere = Matiere::find($id);
        return view('matieres.show', compact('matiere'));
    }
    public function create()
    {
        $groupes = GroupeMatiere::all();
        $promotions = Promotion::all();
        $professeurs  = Prof::all();

        return view('matieres.create', compact('groupes', 'promotions', 'professeurs'));
    }
    public function add_multiple()
    {
        $promotion = DB::table('promotions')->latest('created_at')->first();

        for ($i = 1; $i < 23; $i++) {
            $replication = Matiere::find($i);
            $newMatiere = $replication->replicate();
            $newMatiere->promotion_id = $promotion->id; // the new promo_id
            $newMatiere->save();
        }

        return redirect()->route("promo.index")->with('success', 'Matière créée !');
    }
    public function edit($id)
    {
        $matiere = Matiere::find($id);
        $groupes = GroupeMatiere::all();
        $promotions = Promotion::all();
        $professeurs  = Prof::all();

        return view('matieres.edit', compact('matiere', 'groupes', 'promotions', 'professeurs'));
    }
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'intitule' => 'required',
            'coefficient' => 'required',
            'groupematiere' => 'required',
            'promotion' => 'required',
            'professeur' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->route("matieres.create")->withErrors($validator)->withInput();
        }

        $matiere = new Matiere();

        $matiere->intitule = $request->input('intitule');
        $matiere->coefficient = $request->input('coefficient');
        $matiere->groupe_matiere_id = $request->input('groupematiere');
        $matiere->promotion_id = $request->input('promotion');
        $matiere->prof_id = $request->input('professeur');

        $matiere->save();

        return redirect()->route("matieres.index")->with('success', 'Matière créée !');
    }
    public function update(Request $request, $id)
    {
        $matiere = Matiere::find($id);
        $validator = Validator::make($request->all(), [
            'intitule' => 'required',
            'coefficient' => 'required',
            'groupematiere' => 'required',
            'promotion' => 'required',
            'professeur' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route("matieres.edit", $id)->withErrors($validator)->withInput();
        }

        $matiere->intitule = $request->input('intitule');
        $matiere->coefficient = $request->input('coefficient');
        $matiere->groupe_matiere_id = $request->input('groupematiere');
        $matiere->promotion_id = $request->input('promotion');
        $matiere->prof_id = $request->input('professeur');


        $matiere->updated_at = now();
        $matiere->save();

        return redirect()->route("matieres.index")->with('success', 'Matière mise à jour !');
    }
    public function destroy($id)
    {
        $matiere = Matiere::find($id);

        $matiere->delete();

        return redirect()->route("matieres.index")->with('error', 'Matière supprimés avec succès !');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("matieres")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Matière(s) supprimé(s) avec succès."]);
    }
}
