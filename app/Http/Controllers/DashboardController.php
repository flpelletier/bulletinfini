<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eleve;
use App\Promotion;
use App\Note;
use App\Matiere;
use App\Prof;

class DashboardController extends Controller
{
    public function index()
    {
        $eleves = Eleve::all();
        $promotions = Promotion::all();
        $matieres = Matiere::all();
        $notes = Note::all();
        $professeurs = Prof::all();

        return view('dashboard.index', compact('eleves','promotions','matieres','notes','professeurs'));
    }
}
