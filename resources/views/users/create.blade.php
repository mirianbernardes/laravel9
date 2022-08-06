@extends('layouts.header')

@section('title', 'Add Usuário')
    
@section('content')
    
    <h1>Adicionar Usuários</h1>
    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="Digite o nome" value="{{old('name')}}">
        <input type="email" name="email" id="email" placeholder="Digite o email" value="{{old('email')}}">
        <input type="password" name="password" id="password" placeholder="Digite a senha">
        <button type="submit">Salvar</button>
    </form>


@endsection