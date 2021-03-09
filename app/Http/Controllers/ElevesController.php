<?php

namespace App\Http\Controllers;

use App\Eleve;
use App\Promotion;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Spatie\SimpleExcel\SimpleExcelReader;

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
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("eleves")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Elève(s) supprimé(s) avec succès."]);
    }
    public function import(Request $request)
    {

        // 1. Validation du fichier uploadé. Extension ".xlsx" autorisée
        $validator = Validator::make($request->all(), [
            'fichier' => 'bail|required|file|mimes:xlsx'
        ]);
        if ($validator->fails()) {
            return redirect()->route("promo.index")->withStatus(__("Fichier non valide, veuillez vérifier l'extention du fichier"));
        }

        // 2. On déplace le fichier uploadé vers le dossier "public" pour le lire
        $fichier = $request->fichier->move(public_path(), $request->fichier->hashName());

        // 3. $reader : L'instance Spatie\SimpleExcel\SimpleExcelReader
        $reader = SimpleExcelReader::create($fichier);

        // On récupère le contenu (les lignes) du fichier
        $rows = $reader->getRows();

        // $rows est une Illuminate\Support\LazyCollection

        // 4. On insère toutes les lignes dans la base de données
        $status = Eleve::insert($rows->toArray());

        // Si toutes les lignes sont insérées
        if ($status) {

            // 5. On supprimer le fichier uploadé
            $reader->close(); // On ferme le $reader
            unlink($fichier);

            // 6. Retour vers le formulaire avec un message $msg
            return redirect()->route("promo.index")->withStatus(__("Importation réussie !"));

        } else {
            abort(500);
        }
    }
}
