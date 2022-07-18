{{-- receber template --}}
@extends('layouts.app')
{{-- title --}}
@section('title', 'Editar usuário ')
@section('content')
<h1>Editar usuário {{ $user->name }}</h1>
@include('includes.validations-form')
<form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @include('users._partials.form')
</form>
@endsection