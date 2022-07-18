{{-- receber template --}}
@extends('layouts.app')
{{-- title --}}
@section('title', 'Listagem dos usuários')
@section('content')
<h1>Listagem dos usuários
    <a class="btn btn-outline-dark btn-sm px-3"href="{{ route('users.create') }}">+</a>
</h1>
<form action="{{ route('users.index') }}" method="get" class="row container">
    <input type="text" name="search" placeholder="Usuario" class="form-control col">
    <button type="submit" class="btn btn-primary col-md-2 ms-1">Pesquisar</button>
</form>
<table class="table table-striped mt-4">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Editar</th>
            <th>Detalhes</th>   
            <th>Anotações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>
                @if ($user->image)
                    <img src="{{ url("storage/{$user->image}") }}" alt="{{ $user->name }}"
                        style="width:100px"
                    >
                @else
                <img src="{{ url('images/favicon.ico.png') }}" alt="{{ $user->name }}">

                @endif
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a class="btn btn-warning"href="{{ route('users.edit', $user->id) }}">Editar</a>
            </td>
            <td>
                <a class="btn btn-info"href="{{ route('users.show', $user->id) }}">Detalhes</a>
            </td>
            <td>
                <a class="btn btn-primary"href="{{ route('comments.index', $user->id) }}">Anotações ({{ $user->comments->count() }})</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div>
    {{ $users->appends([
        'search' => request()->get('search', '')
    ])->links() }}
</div>
@endsection