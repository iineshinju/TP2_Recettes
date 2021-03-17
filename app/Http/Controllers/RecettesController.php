<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecettesController extends Controller
{
    //
    function index() {
        return view('recettes');
    }
}
