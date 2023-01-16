<div>
    <x-slot name="header">
        <div class="flex gap-2 items-center">
            <div class="">
                <a href="{{ url('admin/diagnosticos') }}" class="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </a>
            </div>


            <div class="flex justify-between flex-1 w-64">
                
                <div class="flex gap-2 items-center">
                    <div><h1 class="font-semibold text-xl text-gray-800 leading-tight">{{ $diagnostico->oficina }}</h1></div>
                    <div class="text-gray-600">(Responsable: {{ $diagnostico->responsable }})</div>
                </div>
    
                <div class="text-end">
                    <div>{{ date('j/m/Y', strtotime($diagnostico->fecha)) }}</div>
                    <div class="text-sm text-gray-500">Version: {{ $diagnostico->version }}</div>
                </div>
            </div>
        </div>
       
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
            <div class="flex justify-end mb-2">
                <button wire:click="update" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Guardar todo</button>
            </div>
            <div class="mb-2">
                <label for="objetivos_actividades" class="block mb-2 text-gray-900 text-lg font-bold text-center">OBJETIVOS Y ACTIVIDADES</label>
                <textarea wire:model="objetivos_actividades" wire:change="$set('o_a', 'true')" id="objetivos_actividades" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            @if ($o_a)
                <div class="flex justify-end mb-2">
                    <button wire:click="objetivos_actividades" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-1 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Guardar</button>
                </div>
            @endif 

            <div class="mb-2">
                <label for="estructura_organizativa" class="block mb-2 text-gray-900 text-lg font-bold text-center">ESTRUCTURA ORGANIZATIVA</label>
                <textarea wire:model="estructura_organizativa" wire:change="$set('e_o', 'true')" id="estructura_organizativa" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            @if ($e_o)
                <div class="flex justify-end mb-2">
                    <button wire:click="estructura_organizativa" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-1 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Guardar</button>
                </div>
            @endif
            
            <div class="mermaid">

                {!! $estructura_organizativa !!}

            </div>

            {{-- reportaje fotografico --}}
            <div class="mt-6 border bg-white rounded-lg p-4">
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
                            {{-- <input type="file" wire:model="url"> --}}
                            {{-- <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label> --}}
                            <input wire:model="url" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="image_help" type="file">
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image_help">No soporta imagenes mayores de 2MB</div>
                            <x-jet-input-error for="url"/>
                        </div>
                        <div>
                            <button wire:click="createImage" wire:loading.attr="disabled" wire:target="createImage, url" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Agregar</button>
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
            </div>
            {{-- end reportaje fotografico --}}

            {{-- Observaciones generales --}}
            <div class="mb-2 mt-6">
                <label for="observaciones_generales" class="block mb-2 text-gray-900 text-lg font-bold">OBSERVACIONES GENERALES</label>
                <textarea wire:model="observaciones_generales" wire:change="$set('o_g', 'true')" id="observaciones_generales" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            @if ($o_g)
                <div class="flex justify-end mb-2">
                    <button wire:click="observaciones_generales" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-1 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Guardar</button>
                </div>
            @endif
            {{-- end observaciones generales --}}

             {{-- reportaje fotografico --}}
             <div class="mt-6 border bg-white rounded-lg p-4">
                <div class="text-gray-900 text-lg font-bold text-center">
                    PRINCIPALES FLUJOS DE INFORMACIÓN
                </div>
                <div class="text-gray-700 text-center">
                    DESCRIPCIÓN GENERAL DEL FLUJO DE INFORMACIÓN
                </div>

                <div class="md:flex row gap-2 space-y-3 md:space-y-0 mb-2 items-center mt-4">
                    <div class="w-full">
                        {{-- <label for="oficina" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Oficina</label> --}}
                        <input wire:model="f_descripcion" type="text" name="f_descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                   
                    <div class="">
                        <div class="">
                            <button wire:click="createFlujo" type="button" id="createFlujo" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Agregar</button>
                        </div>
                    </div>
                </div>
                
                <div class="relative overflow-x-auto shadow-md rounded">
                    
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Descripción
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acción
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($flujos as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                   
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->descripcion }}
                                    </th>
                                  
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2 items-center">
                                           
                                            <button class="text-blue-500" wire:click="updateFlujoShowModal({{ $item->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                  </svg>   
                                            </button>
                                           
                                            <button class="text-red-500" wire:click="deleteFlujoShowModal({{ $item->id }})">
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
             {{-- end principales flujos --}}

             {{-- caracteristia de los flujos --}}
             <div class="mt-6 border bg-white rounded-lg p-4">
                <div class="text-gray-900 text-lg font-bold text-center">
                    CARACTERÍSTICAS DE LOS PRINCIPALES FLUJOS DE INFORMACIÓN
                </div>

                <div class="md:flex row gap-2 space-y-3 md:space-y-0 mb-2 mt-4 items-end">
                    <div class="basis-1/2">
                        <label for="entrada_proveedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ENTRADA / PROVEEDOR</label>
                        <input wire:model="entrada_proveedor" type="text" name="entrada_proveedor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="basis-1/2">
                        <label for="tratamiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TRATAMIENTO</label>
                        <input wire:model="tratamiento" type="text" name="tratamiento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="basis-1/4">
                        <label for="salida_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SALIDA / CLIENTE</label>
                        <input wire:model="salida_cliente" type="text" name="salida_cliente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="">
                        <div class="">
                            <button wire:click="createCaracteristica" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Agregar</button>
                        </div>
                    </div>
                </div>

                <div class="relative overflow-x-auto shadow-md rounded">
                    
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Entrada / Proveedor
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tratamiento
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Salida / Cliente
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acción
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($caracteristicas as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                   
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->entrada_proveedor }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->tratamiento }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->salida_cliente }}
                                    </th>
                                  
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2 items-center">
                                           
                                            <button class="text-blue-500" wire:click="updateCaracteristicaShowModal({{ $item->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                  </svg>   
                                            </button>
                                           
                                            <button class="text-red-500" wire:click="deleteCaracteristicaShowModal({{ $item->id }})">
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
             {{-- end caracteristicas de los flujos --}}

             {{-- datos --}}
             <div class="mt-6 border bg-white rounded-lg p-4">
                <div class="text-gray-900 text-lg font-bold text-center">
                    DATOS SUSCEPTIBLES DE SER INTEGRADOS EN EL SIG
                </div>

                <div class="md:flex row gap-2 space-y-3 md:space-y-0 mb-2 mt-4 items-end">
                    <div class="basis-1/2">
                        <label for="d_descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ENTRADA / PROVEEDOR</label>
                        <input wire:model="d_descripcion" type="text" name="d_descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="basis-1/2">
                        <label for="comentario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">comentario</label>
                        <input wire:model="comentario" type="text" name="comentario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                   
                    <div class="">
                        <div class="">
                            <button wire:click="createDato" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Agregar</button>
                        </div>
                    </div>
                </div>

                <div class="relative overflow-x-auto shadow-md rounded">
                    
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Descripción
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Comentario
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acción
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                   
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->descripcion }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->comentario }}
                                    </th>
                                  
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2 items-center">
                                           
                                            <button class="text-blue-500" wire:click="updateDatoShowModal({{ $item->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                  </svg>   
                                            </button>
                                           
                                            <button class="text-red-500" wire:click="deleteDatoShowModal({{ $item->id }})">
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
             {{-- end datos --}}

              {{-- Observaciones generales --}}
            <div class="mb-2 mt-6">
                <label for="observaciones_medios" class="block mb-2 text-gray-900 text-lg font-bold text-center">OBSERVACIONES SOBRE LOS MEDIOS DISPONIBLES PARA EL TRATAMIENTO DE INFORMACIÓN</label>
                <textarea wire:model="observaciones_medios" wire:change="$set('o_m', 'true')" id="observaciones_medios" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            @if ($o_m)
                <div class="flex justify-end mb-2">
                    <button wire:click="observaciones_medios" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-1 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Guardar</button>
                </div>
            @endif
            {{-- end observaciones generales --}}

        </div>
    </div>

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
