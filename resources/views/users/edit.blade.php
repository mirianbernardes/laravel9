@extends('layouts.header')

@section('title', 'Add Usuário')
    
@section('content')
    
    <h1>Editar Usuários {{$users->name}}</h1>
    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('users.update', $users->id)}}" method="post">
        @method('PUT')
        @csrf
        <input type="text" name="name" id="name" placeholder="Digite o nome" value="{{$users->name}}">
        <input type="email" name="email" id="email" placeholder="Digite o email" value="{{$users->email}}">
        <input type="password" name="password" id="password" placeholder="Digite a senha">
        <button type="submit">Salvar</button>
    </form>


@endsection