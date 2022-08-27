@extends('layouts.header')

@section('title', 'Lista Usuarios')
    
@section('content')

<h1 class="text-3xl font-bold py-2">Usuários</h1>

<a href="{{route('users.create')}}" class="inline-block px-6 py-2.5 mb-3 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Novo Usuário</a>

<form action="{{route('users.index')}}" method="get">
    <input type="text" name="search" id="search" placeholder="Pesquisar" class="inline-block px-3 py-1.5 font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
    <button type="submit" class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">Pesquisar</button>
</form>

<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"></th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Nome</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">E-mail</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"></th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"></th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @if ($user->image)                                        
                                        <img src="{{url("storage/$user->image") }}" alt="{{$user->name}}" class="inline-block h-12 w-12 rounded-lg ring-2 ring-white">
                                    @else
                                        <img src="{{url('storage/sem_imagem.png') }}" alt="{{$user->name}}" class="inline-block h-12 w-12 rounded-lg ring-2 ring-white">
                                    @endif
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{$user->name}}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{$user->email}}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><a href="{{route('users.show', $user->id)}}" class="bg-cyan-600 text-white rounded py-2 px-4">Detalhes</a></td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><a href="{{route('users.edit', $user->id)}}" class="bg-emerald-600 text-white rounded py-2 px-4">Editar</a></td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><a href="{{route('comments.index', $user->id)}}" class="bg-sky-600 text-white rounded py-2 px-4">Anotações ({{$user->comments->count()}})</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="py-4">
                {{$users->appends([
                    'search' => request()->get('search', '')
                ])
                ->links()}}
            </div>
        </div>
    </div>
</div>

@endsection