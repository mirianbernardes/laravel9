@extends('layouts.header')

@section('title', "Comentários do Usuários {{$user->name}}")
    
@section('content')

<h1 class="text-3xl font-bold py-2">Comentários do Usuários {{$user->name}}</h1>

<a href="{{route('comments.create', $user->id)}}" class="inline-block px-6 py-2.5 mb-3 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Novo Comentário</a>

<form action="{{route('comments.index', $user->id)}}" method="get">
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
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Comentário</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Mostrar ?</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"></th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{$comment->description}}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{$comment->visible ? 'Sim' : 'Não'}}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><a href="{{route('comments.edit', ['user_id' => $user->id, 'id' => $comment->id])}}" class="bg-emerald-600 text-white rounded py-2 px-4">Editar</a></td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <form action="{{route('comments.delete', ['user_id' => $comment->user_id, 'id' => $comment->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white rounded font-bold py-2 px-4">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h5 class="mt-4">Anotações ({{$user->comments->count()}})</h5>
            </div>
        </div>
    </div>
</div>

@endsection