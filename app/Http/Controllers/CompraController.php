<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index(){
        return view('layouts.compra.compra');
    }
}
