@extends('layouts.header')

@section('title', 'Add Usuário')
    
@section('content')
    
    <h1>Editar Usuários</h1>
    
    @include('components.user-validation-errors')

    <form action="{{route('users.update', $users->id)}}" method="post">
        @method('PUT')
        @include('users._partials.form')
    </form>


@endsection