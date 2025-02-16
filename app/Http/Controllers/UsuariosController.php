<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(){
        $usu = User::all();
        return view('layouts.usuario.usuario', compact('usu'));
    }
}
