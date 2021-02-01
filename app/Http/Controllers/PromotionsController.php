<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    public function index()
    {
        $promotion = Promotion::all();
        return view('promotions.index', compact('promotion'));
    }
}
