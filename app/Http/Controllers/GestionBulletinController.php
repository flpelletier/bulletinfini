<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;

class GestionBulletinController extends Controller
{
    function index(){

        return view("management.bulletin.index")->with("promotions", Promotion::all());
    }
    function bulletin(Request $request){
        return view("management.bulletin.bulletin")->with("promotion", Promotion::find($request->selector));
    }
}
