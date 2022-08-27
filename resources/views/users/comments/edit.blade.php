@extends('layouts.header')

@section('title', "Editar Comentário {$user->name}")
    
@section('content')
<a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4">Voltar</a><br><br>
<h1 class="text-3xl font-bold">Editar Comentário para {{$user->name}}</h1>
    
@include('components.user-validation-errors')

<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ route('comments.update', $comment->id) }}" method="post">
                @method('PUT')
                @include('users.comments._partials.form')
            </form>
        </div>
    </div>
</div>

@endsection