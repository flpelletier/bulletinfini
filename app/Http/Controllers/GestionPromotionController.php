<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;

class GestionPromotionController extends Controller
{
    function index(){

        return view("management.promotion.index")->with("promotions", Promotion::all());
    }
    function promo(Request $request){
        return view("management.promotion.promotion")->with("promotion", Promotion::find($request->selector));
    }
}
