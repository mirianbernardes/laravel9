@extends('layouts.header')

@section('title', 'Lista Usuarios')
    
@section('content')
    
<h1>Listagem dos usuarios</h1>
<a href="{{route('users.create')}}">Novo Usuario</a>

<form action="{{route('users.index')}}" method="get">
    <input type="text" name="search" id="search" placeholder="Pesquisar">
    <button type="submit">Pesquisar</button>
</form>
<table width='80%'>
    <tr>
        <td>Nome</td>
        <td>Email</td>
        <td></td>
        <td></td>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><a href="{{route('users.show', $user->id)}}">Detalhes</a></td>
            <td><a href="{{route('users.edit', $user->id)}}">Editar</a></td>
        </tr>
    @endforeach
</table>

@endsection