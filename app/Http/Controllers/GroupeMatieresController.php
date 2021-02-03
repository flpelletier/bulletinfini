<?php

namespace App\Http\Controllers;

use App\GroupeMatiere;
use App\Matiere;
use Illuminate\Http\Request;
use Validator;

class GroupeMatieresController extends Controller
{
    public function index()
    {
        $matieres = GroupeMatiere::all();
        return view('groupes.index', compact('matieres'));
    }
    public function show($id)
    {
        $matiere = GroupeMatiere::find($id);
        $matieres = Matiere::all();
        $matiereArray = array();
        //dd($matiere->matieres);

        // dd($matiereArray);
        return view('groupes.show', compact('matiere', 'matieres'));
    }
    public function create()
    {
        $matieres = Matiere::all();

        return view('groupes.create', compact('matieres'));
    }
    public function edit($id)
    {
        $groupe = GroupeMatiere::find($id);
        $matiere = Matiere::all();

        return view('groupes.edit', compact('matiere', 'groupe'));
    }
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'intitule' => 'required',
            'coefficient' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route("groupes.create")->withErrors($validator)->withInput();
        }
        $matieres = $request->input('matiere');

        $matiereArray = array();
        $matiere = new GroupeMatiere();

        $matiere->intitule = $request->input('intitule');
        $matiere->coefficient = $request->input('coefficient');

        $matiere->save();

        foreach ($matieres as $addmatiere) {
            $matiereArray[] = $addmatiere;
            $matiere_udp = Matiere::find($addmatiere);
            $matiere_udp->groupe_matiere_id = $matiere->id;
            $matiere_udp->save();
        }

        //dd($matiereArray);



        return redirect()->route("groupes.index")->with('success', 'Groupe créée !');
    }
    public function update(Request $request, $id)
    {
        $matiere = GroupeMatiere::find($id);
        $validator = Validator::make($request->all(), [
            'intitule' => 'required',
            'coefficient' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route("groupes.edit", $id)->withErrors($validator)->withInput();
        }

        $matiere->intitule = $request->input('intitule');
        $matiere->coefficient = $request->input('coefficient');

        $matiere->updated_at = now();
        $matiere->save();

        return redirect()->route("groupes.index")->with('success', 'Groupe mise à jour !');
    }
    public function destroy($id)
    {
        $matiere = GroupeMatiere::find($id);

        $matiere->delete();

        return redirect()->route("groupes.index")->with('error', 'Groupe supprimé avec succès !');
    }
}
