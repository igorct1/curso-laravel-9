{{-- receber template --}}
@extends('layouts.app')
{{-- title --}}
@section('title', 'Novo usuário')
@section('content')
<h1>Novo usuário</h1>
@include('includes.validations-form')
<form action="{{ route('users.store') }}" method="post">
    @include('users._partials.form')
</form>
@endsection