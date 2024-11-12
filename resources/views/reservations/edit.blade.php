<x-admin-layout>

    <h1 class=" text-3xl mb-4">
        Editar Reservacion
    </h1>

    <form action="{{ route('reservations.update', $reservation) }}" 
        method="POST">
        @csrf
        @method('PUT')

        <x-validation-errors class=" mb-4"> </x-validation-errors>

        {{-- div para la sala --}}
        <div class="mb-5">

            <label for="room_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione una sala:</label>
            <select name="room_id" id="room_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">-- Seleccione una Sala --</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" {{ old('room_id', $reservation->room_id) == $room->id ? 'selected' : '' }}>
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
                value="{{ $reservation->date }}">
            </input>
            @error('date')
                <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
            @enderror
        </div>

        {{-- div para la hora --}}
        <div class="mb-5">

            <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione una Hora:</label>
            <select name="time" id="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">-- Seleccione una Hora --</option>
                @foreach ($hours as $hour)
                    <option value=" {{ $hour }}" {{ old('time',$reservation->time) == $hour ? 'selected' : '' }}">
                        {{ $hour }}
                    </option>
                @endforeach
            </select>

            @error('select')
                <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
            @enderror
        </div>

        {{-- div para el status --}}

        <div class="mb-5">

            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione una Estado:</label>
            <select name="status" id="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">-- Seleccione una Estado --</option>
                <option value="pendiente" {{ old('status',$reservation->status) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="aceptado" {{ old('status', $reservation->status) == 'aceptado' ? 'selected' : '' }}>Aceptado</option>
                <option value="rechazado" {{ old('status',$reservation->status) == 'rechazado' ? 'selected' : '' }}>Rechazado</option>
            </select>

            @error('select')
                <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class=" flex justify-end gap-2">
            <x-danger-button onclick="deleteReservation()">
                Eliminar
            </x-danger-button>

            <x-button>
                Actualizar
            </x-button>
        </div>

    </form>

    <form action=" {{ route('reservations.destroy', $reservation) }}" id="formDeleteReservation" method="POST">
        @csrf
        @method('DELETE')
    </form>

        @push('js')
            <script>
                function deleteReservation() {
                    event.preventDefault();
                    //Modal de confirmacion
                    Swal.fire({
                        title: 'Esta usted seguro?',
                        text: "Usted no podra revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si!'
                    }).then((result) => {
                        if (result.isConfirmed){
                            let form = document.getElementById('formDeleteReservation');
                            form.submit();
                        }
                    })
                }
            </script>
        @endpush


</x-admin-layout>