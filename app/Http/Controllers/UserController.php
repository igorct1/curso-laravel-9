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
        // listar usuario baseado no id recebido pelo método get
        // $user = User::where('id', $id)->first();
        // outra forma de recuperar usuario
        // se não existir nenhum usuario com esse ID, retornar para a /users (listagem dos usuarios)
        if(!$user = User::find($id))
            // retorna para a rota de usuarios
            return redirect()->route('users.index');
        return view('users.show', compact('user'));
    }
    public function create()
    {
        return view('users.create');
    }
    public function store()
    {
        dd('cadastrando o usuario');
    }
}
