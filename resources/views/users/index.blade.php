{{-- receber template --}}
@extends('layouts.app')
{{-- title --}}
@section('title', 'Listagem dos usuários')
@section('content')
<h1>Listagem dos usuários
    (<a href="{{ route('users.create') }}">+</a>)
</h1>
<form action="{{ route('users.index') }}" method="get">
    <input type="text" name="search" placeholder="Usuario">
    <button type="submit">Pesquisar</button>
</form>
<ul>
    @foreach ($users as $user)
        <li>{{ $user->name }} -
            {{ $user->email }} |
            <a href="{{ route('users.edit', $user->id) }}">Editar</a>
            <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
        </li>
    @endforeach
</ul>
@endsection