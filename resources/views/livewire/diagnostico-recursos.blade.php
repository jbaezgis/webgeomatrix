<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2 bg-white py-6">
        <div class="">
            <div class="flex justify-between">
                <div>
                    <a href="{{ url('admin/diagnostico/edit/'.$diagnostico->id) }}" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm pl-2 pr-3 py-2 dark:bg-gray-600 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>  Atrás
                    </a>
                </div>

                
            </div>


          
        </div>

       
        
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

            {{-- reportaje fotografico --}}
            {{-- <div class="mt-6 border bg-white rounded-lg p-4">
                <div class="text-gray-900 text-lg font-bold text-center">
                    REPORTAJE FOTOGRAFICO
                </div>

                <div>
                    <div class="max-w-md mb-2">
                        @if ($url)
                            <img src="{{ $url->temporaryUrl() }}" alt="" class="">
                        @endif
                        <div wire:loading wire:target="url" class="mb-2 p-4 text-sm text-gray-700 bg-gray-200 rounded-lg dark:bg-gray-800 dark:text-gray-300" role="alert">
                            <span class="font-medium">Cargando imagen!</span> Espera un momento hasta que se cargue la imagen.
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <div class="mb-2">
                            
                            <input wire:model="url" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="image_help" type="file">
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image_help">No soporta imagenes mayores de 2MB</div>
                            <x-jet-input-error for="url"/>
                        </div>
                        <div>
                            <button wire:click="createImage" wire:loading.attr="disabled" wire:target="createImage, url" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cargar</button>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach ($images as $item)
                        <div class="w-full max-w-7xl mx-auto">
                            <div class="relative">
                                <div>
                                    <img class="" src="{{ Storage::url($item->url) }}" alt="">
                                </div>
                                <div class="absolute bottom-1 flex gap-2 px-2">
                                    <div> 
                                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                              </svg>                                              
                                        </a>
                                    </div>
                                    <div>  
                                        <button wire:click="deleteImageShowModal({{ $item->id }})" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                              </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div> --}}
            
            <div class="bg-white p-4 rounded border">
                {{-- @if ($recursoId)     
                    <div class="flex gap-2">
                        <div class="mb-2">
                            <input wire:model="url" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="image_help" type="file">
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image_help">No soporta imagenes mayores de 2MB</div>
                            <x-jet-input-error for="url"/>
                        </div>
                        <div>
                            <button wire:click="createImage" wire:loading.attr="disabled" wire:target="createImage, url" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cargar</button>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach ($images as $item)
                        <div class="w-full max-w-7xl mx-auto">
                            <div class="relative">
                                <div>
                                    <img class="" src="{{ Storage::url($item->url) }}" alt="">
                                </div>
                                <div class="absolute bottom-1 flex gap-2 px-2">
                                    <div> 
                                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                              </svg>                                              
                                        </a>
                                    </div>
                                    <div>  
                                        <button wire:click="deleteImageShowModal({{ $item->id }})" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                              </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif --}}
                <div class="md:flex row gap-2 space-y-3 md:space-y-0 mb-2 items-center mt-4">

                    <div class="basis-1/3">
                        <label for="equipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Equipo</label>
                            <select wire:model.debounce.500ms="equipo" id="equipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option selected>Seleccionar</option>
                            <option value="Desktop">Desktop</option>
                            <option value="Laptop">Laptop</option>
                            <option value="Servidor">Servidor</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Smart Phone">Smart Phone</option>
                            <option value="Impresora">Impresora</option>
                        </select>
                        @error('equipo')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="basis-1/3">
                        <x-jet-label for="marca_modelo" value="{{ __('Marca y Modelo') }}" />
                        <x-jet-input id="marca_modelo" class="block mt-1 w-full" type="text" name="marca_modelo"
                            wire:model.debounce.500ms="marca_modelo" required/>
                        @error('marca_modelo')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <div class="basis-1/3">
                        <x-jet-label for="capacidades" value="{{ __('Capacidades') }}" />
                        <x-jet-input id="capacidades" class="block mt-1 w-full" type="text" name="capacidades"
                            wire:model.debounce.500ms="capacidades" />
                        @error('capacidades')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex gap-2">
                    <div class="mt-8">
                        <label class="relative inline-flex items-center mb-4 cursor-pointer">
                            <input wire:model.debounce.500ms="red_servidor" type="checkbox" value="" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Red y Servidor</span>
                          </label>
                    </div>
        
                    <div class="mt-8">
                        <label class="relative inline-flex items-center mb-4 cursor-pointer">
                            <input wire:model.debounce.500ms="acceso_internet" type="checkbox" value="" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Acceso a internet?</span>
                          </label>
                    </div>
        
                    <div class="basis-1/3">
                        <x-jet-label for="personal_asignado" value="{{ __('Personal Asignado') }}" />
                        <x-jet-input id="personal_asignado" class="block mt-1 w-full" type="text" name="personal_asingado"
                            wire:model.debounce.500ms="personal_asignado" />
                        @error('personal_asignado')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end items-end pb-2">
                    @if ($recursoId)
                        {{-- <button wire:click="resetRecurso" type="button" id="createRecurso" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 focus:outline-none">Cancelar</button> --}}
                        <x-jet-button class="ml-3" wire:click="updateRecurso" wire:loading.attr="disabled">
                            {{ __('Actualizar') }}
                        </x-jet-button>
                        <x-jet-button class="ml-3" wire:click="resetRecurso" wire:loading.attr="disabled">
                            {{ __('Cancelar') }}
                        </x-jet-button>
                    @else
                        <x-jet-button class="ml-3" wire:click="createRecurso" wire:loading.attr="disabled">
                            {{ __('Crear') }}
                        </x-jet-button>
                    @endif
                </div>
            </div>

             {{-- recursos --}}
             <div class="mt-6 border bg-white rounded-lg p-4">
                <div class="text-gray-900 text-lg font-bold text-center">
                    RECURSOS DISPONIBLES
                </div>

                <div class="relative overflow-x-auto">              
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-auto">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr class="border">
                                <th scope="col" class="px-3 py-2">
                                    Equipo
                                </th>
                                <th scope="col" class="px-3 py-2">
                                    Modelo y Marca
                                </th>
                                <th scope="col" class="px-3 py-2">
                                    Capacidades
                                </th>
                                <th scope="col" class="px-3 py-2">
                                    Red y Servidor
                                </th>
                                <th scope="col" class="px-3 py-2">
                                    Acceso a Internet
                                </th>
                                <th scope="col" class="px-3 py-2">
                                    Personal Asignado
                                </th>
                                <th scope="col" class="px-3 py-2">
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recursos as $item)
                                <tr class="bg-white border dark:border-gray-700 hover:bg-gray-50">
                                
                                    <th scope="row" class="px-2 py-3 font-medium text-gray-900 dark:text-white">
                                        {{ $item->equipo }}
                                    </th>
                                    <th scope="row" class="px-2 py-3 font-medium text-gray-900 dark:text-white">
                                        {{ $item->marca_modelo }}
                                    </th>
                                    <th scope="row" class="px-2 py-3 font-medium text-gray-900 dark:text-white">
                                        {{ $item->capacidades }}
                                    </th>
                                    <th scope="row" class="px-2 py-3 font-medium text-gray-900 dark:text-white">
                                        @if ($item->red_servidor == true)
                                            Si
                                        @else
                                        @endif
                                    </th>
                                    <th scope="row" class="px-2 py-3 font-medium text-gray-900 dark:text-white">
                                        @if ($item->acceso_internet == true)
                                            Si
                                        @else
                                        @endif
                                    </th>
                                    <th scope="row" class="px-2 py-3 font-medium text-gray-900 dark:text-white">
                                        {{ $item->personal_asignado }}
                                    </th>
                                
                                    <td class="px-2 py-3">
                                        <div class="flex gap-2 items-center">
                                            <button class="text-gray-600 inline-flex" wire:click="softwaresShowModal({{ $item->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>   
                                                Softwares
                                            </button>
                                            <button class="text-blue-500" wire:click="updateRecursoShowModal({{ $item->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>   
                                            </button>
                                        
                                            <button class="text-red-500" wire:click="deleteRecursoShowModal({{ $item->id }})">
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
             </div>
             {{-- end recursos --}}
        </div>
    </div>

    {{-- Eliminar Recurso --}}
    <x-jet-dialog-modal wire:model="modalConfirmDeleteRecurso">
        <x-slot name="title">
            {{ __('Eliminar Recurso') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Estas seguro que deseas eliminar esta Recurso.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteRecurso')" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="deleteRecurso" wire:loading.attr="disabled">
                {{ __('Eliminar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Formulario para Recurso --}}
    <x-jet-dialog-modal wire:model="modalRecursoFormVisible" maxWidth="5xl">
        <x-slot name="title">
            Recurso -
            @foreach ($recursos->where('id', $recursoId) as $recurso)
                {{ $recurso->equipo }} {{ $recurso->marca_modelo }}
            @endforeach
        </x-slot>

        <x-slot name="content">

            <div class="mb-2 mt-4 items-end">
                <input wire:model="recurso_id" type="integer" value="{{ $recursoId }}" hidden>
                <div class="flex gap-2">
                    <div class="basis-1/3">
                        <label for="aplicacion" class="block mb-2 text-xs text-gray-900 dark:text-white">APLICACION</label>
                        <input wire:model="aplicacion" type="text" name="aplicacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="basis-1/3">
                        <label for="desarrollador" class="block mb-2 text-xs text-gray-900 dark:text-white">DESARROLLADOR</label>
                        <input wire:model="desarrollador" type="text" name="desarrollador" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="basis-1/3">
                        <label for="tipo_licencia" class="block mb-2 text-xs text-gray-900 dark:text-white">TIPO DE LICENCIA</label>
                        <input wire:model="tipo_licencia" type="text" name="tipo_licencia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                </div>

                <div class="flex gap-2 mt-2">
                    <div class="basis-1/3">
                        <label for="uso" class="block mb-2 text-xs text-gray-900 dark:text-white">USO</label>
                        <input wire:model="uso" type="text" name="uso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="basis-1/3">
                        <label for="frecuencia_uso" class="block mb-2 text-xs text-gray-900 dark:text-white">FRECUENCIA DE USO</label>
                        <input wire:model="frecuencia_uso" type="text" name="frecuencia_uso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="basis-1/3">
                        <label for="personal_asignado" class="block mb-2 text-xs text-gray-900 dark:text-white">PERSONAL ASIGNADO</label>
                        <input wire:model="personal_asignado" type="text" name="personal_asignado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                </div>
                <div class="flex justify-end py-4">
                    {{-- <button wire:click="createSoftware" type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium text-sm px-3 py-1.5 focus:outline-none">Agregar</button> --}}
                    @if ($softwareId)
                        {{-- <button wire:click="resetRecurso" type="button" id="createRecurso" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 focus:outline-none">Cancelar</button> --}}
                        <x-jet-button class="ml-3" wire:click="updateSoftware" wire:loading.attr="disabled">
                            {{ __('Actualizar') }}
                        </x-jet-button>
                        <x-jet-button class="ml-3" wire:click="resetSoftware" wire:loading.attr="disabled">
                            {{ __('Cancelar') }}
                        </x-jet-button>
                    @else
                        <x-jet-button class="ml-3" wire:click="createSoftware" wire:loading.attr="disabled">
                            {{ __('Agregar') }}
                        </x-jet-button>
                    @endif
                </div>
              
            </div>

            {{-- Softwres --}}
            <div class="">
                <div class="relative overflow-x-auto">
                    
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-auto">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr class="border">
                                <th scope="col" class="px-3 py-1">
                                    Aplicacion
                                </th>
                                <th scope="col" class="px-3 py-1">
                                    Desarrollador
                                </th>
                                <th scope="col" class="px-3 py-1">
                                    Tipo de Licencia
                                </th>
                                <th scope="col" class="px-3 py-1">
                                    Uso
                                </th>
                                <th scope="col" class="px-3 py-1">
                                    Frecuencia de Uso
                                </th>
                                <th scope="col" class="px-3 py-1">
                                    Personal Asignado
                                </th>
                                <th scope="col" class="px-3 py-1">
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($softwares->where('recurso_id', $recursoId) as $item)
                                <tr class="bg-white border dark:border-gray-700 hover:bg-gray-50">
                                
                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 dark:text-white">
                                        {{ $item->aplicacion }}
                                    </th>
                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 dark:text-white">
                                        {{ $item->desarrollador }}
                                    </th>
                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 dark:text-white">
                                        {{ $item->tipo_licencia }}
                                    </th>
                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 dark:text-white">
                                        {{ $item->uso }}
                                    </th>
                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 dark:text-white">
                                        {{ $item->frecuencia_uso }}
                                    </th>
                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 dark:text-white">
                                        {{ $item->personal_asignado }}
                                    </th>
                                
                                    <td class="px-2 py-1">
                                        <div class="flex gap-2 items-center">
                                        
                                            <button class="text-blue-500" wire:click="updateSoftwareShowForm({{ $item->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>   
                                            </button>
                                        
                                            <button class="text-red-500" wire:click="deleteSoftwareShowModal({{ $item->id }})">
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
            </div> 
            {{-- end Recursos de los flujos --}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalRecursoFormVisible')" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

    

    {{-- Eliminar Recurso --}}
    <x-jet-dialog-modal wire:model="modalConfirmDeleteSoftware">
        <x-slot name="title">
            {{ __('Eliminar Software') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Estas seguro que deseas eliminar este Software.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteSoftware')" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="deleteSoftware" wire:loading.attr="disabled">
                {{ __('Eliminar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Editar Software --}}
    {{-- <x-jet-dialog-modal wire:model="modalSoftwareFormVisible">
        <x-slot name="title">
            {{ __('Editar Software') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="aplicacion" value="{{ __('aplicacion') }}" />
                <x-jet-input id="aplicacion" class="block mt-1 w-full" type="text" name="aplicacion"
                    wire:model.debounce.500ms="aplicacion" />
                @error('aplicacion')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="desarrollador" value="{{ __('desarrollador') }}" />
                <x-jet-input id="desarrollador" class="block mt-1 w-full" type="text" name="desarrollador"
                    wire:model.debounce.500ms="desarrollador" />
                @error('desarrollador')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="tipo_licencia" value="{{ __('tipo_licencia') }}" />
                <x-jet-input id="tipo_licencia" class="block mt-1 w-full" type="text" name="tipo_licencia"
                    wire:model.debounce.500ms="tipo_licencia" />
                @error('tipo_licencia')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                    <input wire:model.debounce.500ms="sig" type="checkbox" value="" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">SIG?</span>
                  </label>
            </div>

            <div class="">
                <x-jet-label for="comentario" value="{{ __('comentario') }}" />
                <x-jet-input id="comentario" class="block mt-1 w-full" type="text" name="comentario"
                    wire:model.debounce.500ms="comentario" />
                @error('comentario')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalRecursoFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            @if ($softwareId)
                <x-jet-button class="ml-3" wire:click="updateRecurso" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-button>
            @else
                <x-jet-button class="ml-3" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-jet-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal> --}}

    {{-- Eliminar imagen --}}
    <x-jet-dialog-modal wire:model="modalConfirmDeleteImage">
        <x-slot name="title">
            {{ __('Eliminar imagen') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Estas seguro que deseas eliminar esta Imagen.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteImage')" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="deleteImage" wire:loading.attr="disabled">
                {{ __('Eliminar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
