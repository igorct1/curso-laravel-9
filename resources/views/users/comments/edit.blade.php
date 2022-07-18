{{-- receber template --}}
@extends('layouts.app')
{{-- title --}}
@section('title', 'Editar comentário ')
@section('content')
<h1>Editar o cometário do {{ $user->name }}</h1>
@include('includes.validations-form')
<form action="{{ route('comments.update', $comment->id) }}" method="post">
    @method('PUT')
    @include('users.comments._partials.form')
</form>
@endsection