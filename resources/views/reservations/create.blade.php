<x-admin-layout>

    <h1 class=" text-3xl mb-4">
        Nueva Reservacion
    </h1>

    <form action="{{ route('reservations.store') }}" 
        method="POST"
        x-data="data()"
        x-init=" $watch('title', value => {string_to_slug(value)})" >
        @csrf

        <x-validation-errors class=" mb-4"> </x-validation-errors>

        {{-- div para la sala --}}
        <div class="mb-5">

            <label for="room_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione una sala:</label>
            <select name="room_id" id="room_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">-- Seleccione una Sala --</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                        {{ $room->name }}
                    </option>
                @endforeach
            </select>

            @error('select')
                <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
            @enderror
        </div>

        {{-- div para la fecha --}}
        <div class="mb-5">
            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha:</label>
            <input 
                type="date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                name="date" 
                id="date" 
                value="{{ old('date') }}">
            </input>
            @error('date')
                <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
            @enderror
        </div>

        {{-- div para la hora --}}
        <div class="mb-5">

            <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione una Hora:</label>
            <select name="time" id="room_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">-- Seleccione una Hora --</option>
                @foreach ($hours as $hour)
                    <option>
                        {{ $hour }}
                    </option>
                @endforeach
            </select>

            @error('select')
                <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
            @enderror
        </div>

        {{-- div para el boton --}}
        <div class=" flex justify-end">
            <x-button>
                Crear Reservacion
            </x-button>
        </div>

    </form>

</x-admin-layout>