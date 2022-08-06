@extends('layouts.header')

@section('title', 'Add Usuário')
    
@section('content')
    
    <h1>Adicionar Usuários</h1>
    
    @include('components.user-validation-errors')

    <form action="{{ route('users.store') }}" method="post">
        @include('users._partials.form')
    </form>


@endsection