@csrf
<div class="shadow sm:rounded-md sm:overflow-hidden">
    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-3 col-span-3 mt-1">
                <label for="description" class="block text-lg font-medium text-gray-700">Comentário</label>
                <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{$comment->description?? old('description')}}</textarea>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6">
            <div class="flex items-center">
                <input id="visible" name="visible" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                    @if (isset($comment) && $comment->visible)
                        checked = 'checked'
                    @endif
                >
                <label for="visible" class="ml-2 block text-sm text-gray-900"> Mostrar ? </label>
            </div>
        </div>
        <div class="px-4 py-3 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Salvar</button>
        </div>
    </div>
</div>