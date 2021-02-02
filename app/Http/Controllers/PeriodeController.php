<?php

namespace App\Http\Controllers;

use App\Periode;
use App\Promotion;
use Illuminate\Http\Request;
use Validator;
class PeriodeController extends Controller
{
    public function index()
    {
        $periodes = Periode::all();
        return view('periodes.index', compact('periodes'));
    }
    public function create()
    {
        $periodes = Periode::all();
        $promotions  = Promotion::all();

        return view('periodes.create', compact('periodes', 'promotions'));
    }
    public function show($id)
    {
        $periode = Periode::find($id);
        return view('periodes.show', compact('periode'));
    }
    public function edit($id)
    {

        $periode = Periode::find($id);
        $promotions  = Promotion::all();

        return view('periodes.edit', compact('periode', 'promotions'));
    }
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'datedebut' => 'required',
            'datefin' => 'required',
            'promotion' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route("periodes.create")->withErrors($validator)->withInput();
        }

        $periode = new Periode();

        $periode->nom = $request->input('nom');
        $periode->date_debut = $request->input('datedebut');
        $periode->date_fin = $request->input('datefin');
        $periode->promotion_id = $request->input('promotion');

        $periode->save();

        return redirect()->route("periodes.index")->with('success', 'Période créée !');
    }
    public function update(Request $request, $id)
    {
        $periode = Periode::find($id);
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'datedebut' => 'required',
            'datefin' => 'required',
            'promotion' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route("periodes.edit", $id)->withErrors($validator)->withInput();
        }

        $periode->nom = $request->input('nom');
        $periode->date_debut = $request->input('datedebut');
        $periode->date_fin = $request->input('datefin');
        $periode->promotion_id = $request->input('promotion');
        $periode->updated_at = now();

        $periode->save();

        return redirect()->route("periodes.index")->with('success', 'Période mise à jour !');
    }
    public function destroy($id)
    {
        $periode = Periode::find($id);

        $periode->delete();

        return redirect()->route("periodes.index")->with('error', 'Période supprimée avec succès !');
    }
}
