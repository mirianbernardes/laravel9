@extends('layouts.header')

@section('title', 'Welcome')
    
@section('content')

<div>
    <a href="{{route('users.index')}}" class="inline-block px-10 py-6 mb-3 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Usuários</a>
</div>

@endsection