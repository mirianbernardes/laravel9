@extends('layouts.header')

@section('title', 'Usuário')

@section('content')
<a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2  px-4">Voltar</a><br><br>


<div class="max-w-sm rounded overflow-hidden shadow-lg">
    @if ($users->image)                                        
        <img src="{{url("storage/$users->image") }}" alt="{{$users->name}}" class="w-full">
    @else
        <img src="{{url('storage/sem_imagem.png') }}" alt="{{$users->name}}" class="w-full">
    @endif
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">DADOS DO USUÁRIO</div>
      <p class="text-gray-700 text-base">Usuário: {{$users->name}}</p>
        <p class="text-gray-700 text-base">Email: {{$users->email}}</p>
    </div>
    <div class="px-6 pt-4 pb-2">
        <form action="{{route('users.delete', $users->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Deletar</button>
        </form>
    </div>
</div>

@endsection