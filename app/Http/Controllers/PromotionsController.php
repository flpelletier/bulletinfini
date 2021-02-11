<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionsController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('promotions.index', compact('promotions'));
    }
    public function create()
    {
        return view('promotions.create');
    }
    public function edit($id)
    {
        $promotion = Promotion::find($id);
        return view('promotions.edit',  compact('promotion'));
    }
    public function show($id)
    {
        $promotion = Promotion::find($id);
        return view('promotions.show', compact('promotion'));
    }
    public function store(Request $request)
    {
        $promotion = new Promotion;

        $promotion->intitule = $request->get('intitule');
        $promotion->annee = $request->get('annee');
        $promotion->nom_complet = $request->get('nom');
        $promotion->description = $request->get('description');
        $promotion->coordonnees = $request->get('coordonnees');
        $promotion->updated_at = now();
        $promotion->save();

        return redirect()->route('promotions.index')->withStatus(__('Promotion créée avec succès.'));
    }
    public function update(Request $request, $id)
    {
        $promotion = Promotion::find($id);

        $promotion->intitule = $request->get('intitule');
        $promotion->annee = $request->get('annee');
        $promotion->nom_complet = $request->get('nom');
        $promotion->description = $request->get('description');
        $promotion->coordonnees = $request->get('coordonnees');
        $promotion->updated_at = now();
        $promotion->save();

        return redirect()->route('promotions.index')->withStatus(__('Promotion modifiée avec succès.'));
    }
    public function destroy($id)
    {
        $promotion = Promotion::find($id);

        $promotion->delete();
        return redirect()->route('promotions.index')->withStatus(__('Promotion supprimée avec succès'));
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("promotions")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Promotion(s) supprimé(s) avec succès."]);
    }
}
