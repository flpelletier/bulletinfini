<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatieresController extends Controller
{
    public function index()
    {
        return view('back.matieres.index');
    }
}
