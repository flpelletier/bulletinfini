<?php

namespace App\Http\Controllers;

use App\MatieresCertification;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class MatieresCertificationController extends Controller
{
    public function index()
    {
        $matieres = MatieresCertification::all();
        return view('matierescertification.index', compact('matieres'));
    }
    public function create()
    {
        return view('matierescertification.create');
    }
    public function show($id)
    {
        $matiere = MatieresCertification::find($id);
        return view('matierescertification.show', compact('matiere'));
    }
    public function edit($id)
    {
        $matiere = MatieresCertification::find($id);

        return view('matierescertification.edit', compact('matiere'));
    }
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'coefficient' => 'required',
            'matiere' => 'required',
            'type' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route("matierescertification.create")->withErrors($validator)->withInput();
        }

        $matiere = new MatieresCertification();

        $matiere->coefficient = $request->input('coefficient');
        $matiere->matiere = $request->input('matiere');
        $matiere->type = $request->input('type');

        $matiere->save();

        return redirect()->route("matierescertification.index")->with('success', 'Matière créée !');
    }
    public function update(Request $request, $id)
    {
        $matiere = MatieresCertification::find($id);
        $validator = Validator::make($request->all(), [
            'coefficient' => 'required',
            'matiere' => 'required',
            'type' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route("matierescertification.edit", $id)->withErrors($validator)->withInput();
        }

        $matiere->matiere = $request->input('matiere');
        $matiere->coefficient = $request->input('coefficient');
        $matiere->type = $request->input('type');

        $matiere->updated_at = now();

        $matiere->save();

        return redirect()->route("matierescertification.index")->with('success', 'Matière mise à jour !');
    }
    public function destroy($id)
    {
        $matiere = MatieresCertification::find($id);

        $matiere->delete();

        return redirect()->route("matierescertification.index")->with('error', 'Matière supprimée avec succès !');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("matieres_certifications")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Matière(s) supprimé(s) avec succès."]);
    }
}
