<?php

namespace App\Http\Controllers;

use App\Eleve;
use App\Promotion;
use Illuminate\Http\Request;
use Validator;

class ElevesController extends Controller
{
    public function index()
    {
        $eleves = Eleve::all();

        return view('eleves.index', compact('eleves'));
    }
    public function create()
    {
        $promotions = Promotion::all();
        return view('eleves.create', compact('promotions'));
    }
    public function show($id)
    {
        $eleve = Eleve::find($id);
        return view('eleves.show', compact('eleve'));
    }
    public function edit($id)
    {
        $promotions = Promotion::all();
        $eleve = Eleve::find($id);
        return view('eleves.edit', compact('eleve', 'promotions'));
    }
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'promotion' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route("eleves.create")->withErrors($validator)->withInput();
        }

        $eleve = new Eleve();

        $eleve->nom = $request->input('nom');
        $eleve->prenom = $request->input('prenom');
        $eleve->promotion_id = $request->input('promotion');

        $eleve->save();

        return redirect()->route("eleves.index")->with('success', 'Elève créé !');
    }
    public function update(Request $request, $id)
    {
        $eleve = Eleve::find($id);
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'promotion' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route("eleves.edit", $id)->withErrors($validator)->withInput();
        }

        $eleve->nom = $request->input('nom');
        $eleve->prenom = $request->input('prenom');
        $eleve->promotion_id = $request->input('promotion');

        $eleve->updated_at = now();
        $eleve->save();

        return redirect()->route('eleves.index')->with('success', 'Elève mit à jour');
    }
    public function destroy($id)
    {
        //
        $eleve = Eleve::find($id);

        $eleve->delete();

        return redirect()->route("eleves.index")->with('error', 'Elève supprimé avec succès !');
    }
}
