{{-- receber template --}}
@extends('layouts.app')
{{-- title --}}
@section('title', 'Novo usuário')
@section('content')
<h1>Novo usuário</h1>
{{-- se houver algum tipo de erro --}}
@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
        @endforeach
    </ul>
@endif
    <form action="{{ route('users.store') }}" method="post">
        {{-- token para validação --}}
        @csrf
        <input type="text" name="name" placeholder="Nome:" value="{{ old('name') }}">
        <input type="email" name="email" placeholder="E-mail:" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Senha:">
        <button type="submit">Enviar</button>
    </form>
@endsection