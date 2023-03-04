@section('title', "Diagnósticos")
<div>
    <div class="max-w-7xl mx-auto px-2 py-6">
        <div class="flex justify-between pb-6">
            
            <div class="text-3xl">Diagnósticos</div>
            <div>
                <a href="{{ url('admin/diagnostico/hardware-report') }}" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded text-sm px-5 py-2 mr-2 mb-2">Reporte de Hardware</a>
                <a href="{{ url('admin/diagnostico/softwares-report') }}" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded text-sm px-5 py-2 mr-2 mb-2">Reporte de Software</a>
                <a href="{{ url('admin/diagnostico/create') }}" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded text-sm px-5 py-2 mr-2 mb-2">Agregar</a>
            </div>
        </div>
        {{-- <div>
            <x-select-search :data="$diagnosticos2" wire:model="search" placeholder="Select Test"/>
        </div> --}}
        {{-- Table Diagnoticos PC --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg hidden md:block">
            <div class="pb-4 bg-white dark:bg-gray-900 p-4">
                <label for="table-search" class="sr-only">Buscar</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input wire:model.debounce.500ms="search" type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Busqueda">
                </div>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Oficina
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Responsable
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diagnosticos as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                {{ $item->id }}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->oficina }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->responsable }}
                            </td>
                            <td class="px-6 py-4">
                                {{ date('j/m/Y', strtotime($item->fecha)) }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2 items-center">
                                    <a href="{{ url('admin/diagnostico/view/'.$item->id) }}" class="font-medium text-gray-600 dark:text-gray-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                          </svg>                                      
                                    </a>
                                    <a href="{{ url('admin/diagnostico/edit/'.$item->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                          </svg>                                      
                                    </a>
                                   
                                    <button class="text-red-500" wire:click="deleteShowModal({{ $item->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        {{-- {{ $diagnosticos->links() }} --}}
        {{-- End diagnosticos PC --}}

        {{-- Diagnoticos Mobile --}}
        
        <div class="sm:hidden">
            <div>   
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Buscar</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input wire:model.debounce.500ms="search" type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Oficina, Responsable..." required>
                    {{-- <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button> --}}
                </div>
            </div>

            <div class="mt-2">
                @foreach ($diagnosticos as $item)
                    <div class="border bg-white shadow mb-4">
                        <div class="flex gap-4 px-4 pt-4">
                            <div>
                                <div class="uppercase text-gray-400 text-xs">Id</div>
                                <div class="text-gray-700">
                                    {{ $item->id }}
                                </div>
                            </div>
    
                            <div class="text-gray-700">
                                <div class="uppercase text-gray-400 text-xs">Oficina</div>
                                <div>
                                    {{ $item->oficina }}
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-4 mt-4 px-4 pb-4 ">
                            <div class="w-full">
                                <div class="uppercase text-gray-400 text-xs">Responsable</div>
                                <div class="text-gray-700 truncate">
                                    <span>{{ $item->responsable }}</span>
                                </div>
                            </div>
                            
                           
                        </div>

                        <div class=" bg-gray-100  p-2">
                            <div class="flex justify-between">
                                <div class="flex gap-2 items-center">
                                    <div class=" text-gray-400 text-sm">Fecha:</div>
                                    <div class="text-gray-500 text-sm">
                                        {{ $item->fecha }}
                                    </div>
                                </div>
                                <div class="flex gap-4 items-center justify-end">
                                    <a href="{{ url('admin/diagnostico/view/'.$item->id) }}" class="font-medium text-gray-600 dark:text-gray-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                          </svg>                                      
                                    </a>
                                    <a href="{{ url('admin/diagnostico/edit/'.$item->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                          </svg>                                      
                                    </a>
                                   
                                    <button class="text-red-500" wire:click="deleteShowModal({{ $item->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
                
            </div>
            {{-- pagination --}}
            
        </div>
        <div class="py-4">
            {{ $diagnosticos->links() }}
        </div>
    </div>

    {{-- Delete Modal --}}
    <x-jet-dialog-modal wire:model="modalConfirmDelete">
        <x-slot name="title">
            {{ __('Eliminar Diagnóstico') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Estas seguro que deseas eliminar este Diagnóstico.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDelete')" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Eliminar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
