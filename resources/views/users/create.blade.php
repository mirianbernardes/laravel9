@extends('layouts.header')

@section('title', 'Add Usuário')
    
@section('content')
<a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4">Voltar</a><br><br>
<h1 class="text-3xl font-bold">Adicionar Usuários</h1>
    
@include('components.user-validation-errors')

<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @include('users._partials.form')
            </form>
        </div>
    </div>
</div>

@endsection