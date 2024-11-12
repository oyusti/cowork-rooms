<x-admin-layout>

    <form action="{{ route('rooms.store') }}" 
            method="post"
            class=" bg-white rounded-lg p-6 shadow-lg">
        @csrf

        <x-validation-errors class=" mb-4">

        </x-validation-errors>

        <div class="mb-6 flex flex-col gap-6">
            
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre:</label>
                <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escriba un nombre a la sala" />
            </div>

            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion:</label>
                <input type="text" id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escriba una breve descripcion" />
            </div>

            @error('name')
                <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class=" flex justify-end">
            <x-button>
                Crear Sala
            </x-button>
        </div>
    </form>
    

</x-admin-layout>
