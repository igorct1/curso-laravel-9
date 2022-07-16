<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
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
    // Request $request = $request = new Request;
    public function store(StoreUpdateUserFormRequest $request)
    {
        // receber todos os dados do formulário
        // dd($request->all());
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        User::create($data);
        // retornar para rota de usuarios
        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        if(!$user = User::find($id))
        // retorna para a rota de usuarios
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if(!$user = User::find($id))
        // retorna para a rota de usuarios
            return redirect()->route('users.index');
        
        dd($request->all());
            
    }
}
