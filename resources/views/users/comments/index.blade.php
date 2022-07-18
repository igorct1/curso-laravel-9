{{-- receber template --}}
@extends('layouts.app')
{{-- title --}}
@section('title', 'Listagem dos usuários')
@section('content')
<h1>Comentários do usuário {{ $user->name }}
    <a class="btn btn-outline-dark btn-sm px-3"href="{{ route('comments.create', $user->id) }}">+</a>
</h1>
<form action="{{ route('users.index') }}" method="get" class="row container">
    <input type="text" name="search" placeholder="Comentário" class="form-control col">
    <button type="submit" class="btn btn-primary col-md-2 ms-1">Pesquisar</button>
</form>
<table class="table table-dark table-striped mt-4">
    <thead>
        <tr>
            <th>Conteúdo</th>
            <th>Visível</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
        <tr>
            <td>{{ $comment->body }}</td>
            <td>{{ $comment->visible ? 'Sim' : 'Não'}}</td>
            <td>
                <a class="btn btn-warning"href="{{ route('users.edit', $user->id) }}">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection