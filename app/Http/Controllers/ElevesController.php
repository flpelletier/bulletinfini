<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElevesController extends Controller
{
    public function index()
    {
        return view('back.eleves.index');
    }
}
