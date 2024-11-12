<x-admin-layout>

    <x-slot name="action">
        <a href="{{ route('reservations.create') }}"
        class="text-white hover:text-gray-900 bg-gray-900 hover:bg-white 
        hover:border border-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:text-white dark:bg-gray-600  dark:hover:border-gray-600 dark:hover:text-gray-400 
        dark:focus:ring-gray-800">
            Nuevo
        </a>
    </x-slot>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Usuario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sala
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hora
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $reservation->id }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $reservation->user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $reservation->room->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $reservation->date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $reservation->time }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="
                                @if ($reservation->status == 'pendiente')
                                    bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300
                                @elseif ($reservation->status == 'aceptado')
                                    bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300
                                @elseif ($reservation->status == 'rechazado')
                                    bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300
                                @else
                                    text-gray-500
                                @endif
                            ">
                            {{ $reservation->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('reservations.edit', $reservation) }}"
                                class="text-indigo-600 hover:text-indigo-900 mr-3">
                                {{-- <i class="fa-solid fa-pen-to-square fa-lg" style="color: #1e3050;"></i> --}}
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <div class="mt-4">
        {{ $reservations->links() }}
    </div>


</x-admin-layout>
