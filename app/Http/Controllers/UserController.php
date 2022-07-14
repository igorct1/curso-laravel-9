<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        return view('users.index');
        // debugger
        // dd('UserController@index');
    }
    public function show($id)
    {
        dd($id);
        // return view('users.show');
    }
}
