<?php

namespace App\Http\Controllers;

use App\Matiere;
use Illuminate\Http\Request;

class MatieresController extends Controller
{
    public function index()
    {
        $matieres = Matiere::all();

        return view('matieres.index', compact('matieres'));
    }
}
