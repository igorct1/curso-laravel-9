<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // listar registros do banco de dados, é possivel utilizar
        // User::all() ou User::get();
        $users = User::get();
        
        return view('users.index', compact('users')); // compact cria um array de $users
        // debugger
        // dd('UserController@index');
    }
    public function show($id)
    {
        dd($id);
        // return view('users.show');
    }
}
