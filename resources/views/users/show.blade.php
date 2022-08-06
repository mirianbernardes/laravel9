@extends('layouts.header')

@section('title', 'Usuario unico')

@section('content')
    
<h1>Usuário: {{$users->name}}</h1>
<br>
<h2>Email: {{$users->email}}</h2>
<br>
<form action="{{route('users.delete', $users->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>

@endsection
    
