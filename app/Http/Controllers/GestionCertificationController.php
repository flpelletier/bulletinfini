<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;

class GestionCertificationController extends Controller
{
    function index(){

        return view("management.certification.index")->with("promotions", Promotion::all());
    }
    function bulletin(Request $request){
        return view("management.certification.certification")->with("promotion", Promotion::find($request->selector));
    }}
