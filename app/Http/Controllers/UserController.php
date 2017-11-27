<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
    return view('admin.usuarios.index');
    }
    
    public function crear()
    {
    return view('admin.usuarios.crear');
    }
    
    public function lista()
    {
     $users = DB::table('users')->get();
    return view('admin.usuarios.lista', ['users' => $users]);
    }
}
