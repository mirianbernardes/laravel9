@csrf
<div class="shadow sm:rounded-md sm:overflow-hidden">
    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-3 col-span-3">
                <label for="name" class="block text-lg font-medium text-gray-700">Nome</label>
                <input type="text" name="name" id="name" autocomplete="name" value="{{$users->name or old('name')}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full border shadow-sm lg:text-lg border-gray-300 rounded-md">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-3 col-span-3">
                <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" autocomplete="email" value="{{$users->email or old('email')}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full border shadow-sm lg:text-lg border-gray-300 rounded-md">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-3 col-span-3">
                <label for="password" class="block text-lg font-medium text-gray-700">Senha</label>
                <input type="password" name="password" id="password" autocomplete="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full border shadow-sm lg:text-lg border-gray-300 rounded-md">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-3 col-span-3">
                <label for="image" class="block text-lg font-medium text-gray-700">Imagem</label>
                <input type="file" name="image" id="image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full border shadow-sm lg:text-lg border-gray-300 rounded-md">
            </div>
        </div>
        <div class="px-4 py-3 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Salvar</button>
        </div>
    </div>
</div>