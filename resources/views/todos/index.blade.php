<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Busser') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex lg:items-center max-sm:flex-col border-b border-gray-300 px-6 py-4">
                    <div class="flex md:flex-auto">

                    </div>
                    <div class="lg:flex-end max-sm:mt-5">
                        <a data-modal-target="createModal" data-modal-toggle="createModal"
                            class="md:ml-4 text-white bg-indigo-600 p-2.5 rounded-lg">
                            Add
                        </a>
                    </div>
                </div>
                @if (Session::has('msg'))
                    <div id="toast-bottom-right1"
                        class="fixed flex items-center w-full max-w-xs p-4 space-x-4 bg-green-800 text-green-500 divide-x divide-green-200 rounded-lg shadow right-5 bottom-5"
                        role="alert">
                        <div class="text-sm font-normal text-white">{!! \Session::get('msg') !!}</div>
                        <button type="button" class="bg-green-800 text-white p-1.5 inline-flex h-8 w-8"
                            data-dismiss-target="#toast-bottom-right1" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div id="toast-bottom-right"
                            class="fixed flex items-center w-full max-w-xs p-4 space-x-4 bg-red-800 text-red-500 divide-x divide-red-200 rounded-lg shadow right-5 bottom-5"
                            role="alert">
                            <div class="text-sm font-normal text-white">{{ $error }}</div>
                            <button type="button" class="bg-red-800 text-white p-1.5 inline-flex h-8 w-8"
                                data-dismiss-target="#toast-bottom-right" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                @endif
                <div id="createModal" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                    <div class="relative w-full h-full max-w-2xl md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Add
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                    data-modal-hide="createModal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                <div class="mt-2">
                                    <form action="{{ route('todos.store') }}" method="POST">
                                        @csrf
                                        <div>
                                            <label for="titulli"
                                                class="block text-sm font-medium text-gray-700">Titulli</label>
                                            <div class="mt-1">
                                                <input type="text" name="titulli" id="titulli"
                                                    value="{{ old('titulli') }}"
                                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                    required>
                                                <x-input-error class="mt-2" :messages="$errors->get('titulli')" />
                                            </div>
                                        </div>

                                        <div>
                                            <label for="pershkrimi"
                                                class="block text-sm font-medium text-gray-700">Pershkrimi</label>
                                            <div class="mt-1">
                                                <input type="text" name="pershkrimi" id="pershkrimi"
                                                    value="{{ old('pershkrimi') }}"
                                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                    required>
                                                <x-input-error class="mt-2" :messages="$errors->get('pershkrimi')" />
                                            </div>
                                        </div>

                                        <div>
                                            <label for="statusi"
                                                class="block text-sm font-medium text-gray-700">Status</label>
                                            <div class="mt-1">
                                                <select name="statusi" id="statusi">
                                                    <option value="0">Unfinished</option>
                                                    <option value="1">Done</option>
                                                </select>
                                                <x-input-error class="mt-2" :messages="$errors->get('statusi')" />
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <button type="submit"
                                                class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 text-white bg-indigo-600 p-2 rounded-lg text-base font-medium">Add</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="bg-gray-200">
                            <tr>
                                <th
                                    class="px-6 py-4 text-xs font-medium tracking-wider text-left text-gray-800 uppercase">
                                    Titulli
                                </th>
                                <th
                                    class="px-6 py-4 text-xs font-medium tracking-wider text-left text-gray-800 uppercase">
                                    Pershkrimi
                                </th>
                                <th
                                    class="px-6 py-4 text-xs font-medium tracking-wider text-left text-gray-800 uppercase">
                                    Statusi
                                </th>
                                <th
                                    class="px-6 py-4 text-xs font-medium tracking-wider text-right text-gray-800 uppercase">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($todos as $todo)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $todo->titulli }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $todo->pershkrimi }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $todo->statusi === 0 ? 'Unfinished' : 'Done'}}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a data-modal-target="defaultModal{{ $todo->id }}"
                                            data-modal-toggle="defaultModal{{ $todo->id }}"
                                            class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <span class="mx-2 text-gray-300">|</span>
                                        <a data-modal-target="popup-modal{{ $todo->id }}"
                                            data-modal-toggle="popup-modal{{ $todo->id }}"
                                            class="text-red-600 hover:text-red-900">Delete</a>
                                    </td>
                                </tr>
                                <div id="defaultModal{{ $todo->id }}" tabindex="-1" aria-hidden="true"
                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                    <div class="relative w-full h-full max-w-2xl md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg">
                                            <!-- Modal header -->
                                            <div class="flex items-start justify-between p-4 border-b rounded-t">
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    Edit
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                    data-modal-hide="defaultModal{{ $todo->id }}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">
                                                <div class="mt-2">
                                                    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div>
                                                            <label for="titulli"
                                                                class="block text-sm font-medium text-gray-700">
                                                                Titulli
                                                            </label>
                                                            <div class="mt-1">
                                                                <input type="text" name="titulli" id="type"
                                                                    value="{{ $todo->titulli }}" required
                                                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                                <x-input-error class="mt-2"
                                                                    :messages="$errors->get('type')" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <label for="pershkrimi"
                                                                class="block text-sm font-medium text-gray-700">
                                                                Pershkrimi
                                                            </label>
                                                            <div class="mt-1">
                                                                <input type="text" name="pershkrimi" id="type"
                                                                    value="{{ $todo->pershkrimi }}" required
                                                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                                <x-input-error class="mt-2"
                                                                    :messages="$errors->get('type')" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <label for="statusi"
                                                                class="block text-sm font-medium text-gray-700">
                                                                Statusi
                                                            </label>
                                                            <div class="mt-1">
                                                                <select name="statusi" id="statusi">
                                                                    <option value="0">Unfinished</option>
                                                                    <option value="1">Done</option>
                                                                </select>
                                                                <x-input-error class="mt-2"
                                                                    :messages="$errors->get('type')" />
                                                            </div>
                                                        </div>
                                                        <div class="mt-4">
                                                            <button type="submit"
                                                                class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 text-white bg-indigo-600 p-2 rounded-lg text-base font-medium">Rediger</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="popup-modal{{ $todo->id }}" tabindex="-1"
                                    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                        <div class="relative bg-white rounded-lg shadow">
                                            <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                data-modal-hide="popup-modal{{ $todo->id }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-6 text-center">
                                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure?</h3>
                                                <form method="POST" action="{{ route('todos.destroy', $todo->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button data-modal-hide="popup-modal{{ $todo->id }}" type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        yes
                                                    </button>
                                                </form>
                                                <button data-modal-hide="popup-modal{{ $todo->id }}" type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                                        No results found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="p-3 border-t">
                        {{ $todos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>