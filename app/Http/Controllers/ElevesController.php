<?php

namespace App\Http\Controllers;

use App\Eleve;
use Illuminate\Http\Request;

class ElevesController extends Controller
{
    public function index()
    {
        $eleves = Eleve::all();

        return view('eleves.index', compact('eleves'));
    }
}
