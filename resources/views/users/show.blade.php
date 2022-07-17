{{-- receber template --}}
@extends('layouts.app')
{{-- title --}}
@section('title', 'Listagem do usuário')
@section('content')
<h1>Listagem do usuario {{ $user->name }}</h1>
    <ul class="list-group">
        <li class="list-group-item">{{ $user->name }}</li>
        <li class="list-group-item">{{ $user->email }}</li>
    </ul>
<form action="{{ route('users.destroy', $user->id) }}" method="post">
    @method('DELETE')
    @csrf
    <a class="btn btn-outline-dark mt-2 "href="{{ route ('users.index')}}">Voltar a listagem</a>
    <button class="btn btn-danger mt-2"type="submit">Deletar usuário</button>
</form>
@endsection