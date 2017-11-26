<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class RubroController extends Controller
{
    public function index(){
    
    return view('rubro');
    }
    
    public function separarRubros(){
    
    $rubros = \DB::table('users')->select('rubro')->where('id', Auth::user()->id)->get();
    
  
    
    return view('rubro', compact('rubros'));
    
    }
}
