<?php

namespace App\Http\Controllers;

use App\Prof;
use Illuminate\Http\Request;
use Validator;
class ProfesseurController extends Controller
{
    public function index()
    {
        $professeurs = Prof::all();
        return view('professeurs.index', compact('professeurs'));
    }
    public function create()
    {
        return view('professeurs.create');
    }
    public function show($id)
    {
        $professeur = Prof::find($id);
        return view('professeurs.show', compact('professeur'));
    }
    public function edit($id)
    {

        $professeur = Prof::find($id);

        return view('professeurs.edit', compact('professeur'));
    }
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'genre' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route("professeurs.create")->withErrors($validator)->withInput();
        }

        $professeur = new Prof();

        $professeur->nom = $request->input('nom');
        $professeur->prenom = $request->input('prenom');
        $professeur->genre = $request->input('genre');

        $professeur->save();

        return redirect()->route("professeurs.index")->with('success', 'Professeur créée !');
    }
    public function update(Request $request, $id)
    {
        $professeur = Prof::find($id);
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'genre' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route("professeurs.edit", $id)->withErrors($validator)->withInput();
        }

        $professeur->nom = $request->input('nom');
        $professeur->prenom = $request->input('prenom');
        $professeur->genre = $request->input('genre');
        $professeur->updated_at = now();

        $professeur->save();


        return redirect()->route("professeurs.index")->with('success', 'Professeur mise à jour !');
    }
    public function destroy($id)
    {
        $professeur = Prof::find($id);

        $professeur->delete();

        return redirect()->route("professeurs.index")->with('error', 'Professeur supprimé avec succès !');
    }
}
