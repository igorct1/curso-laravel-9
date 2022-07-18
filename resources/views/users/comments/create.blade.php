{{-- receber template --}}
@extends('layouts.app')
{{-- title --}}
@section('title', 'Novo comentário')
@section('content')
<h1>Novo comentário para o usuário {{ $user->name }}</h1>
@include('includes.validations-form')
<form action="{{ route('comments.store', $user->id) }}" method="post">
    @include('users.comments._partials.form')
</form>
@endsection