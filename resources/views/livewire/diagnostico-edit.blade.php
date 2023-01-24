@section('title', $diagnostico->oficina)
<div>
    <x-slot name="header">
        <div class="lg:flex gap-2 items-center">
            <div class="">
                <a href="{{ url('admin/diagnosticos') }}" class="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </a>
            </div>


            <div class="lg:flex justify-between flex-1 lg:w-64 text-center lg:text-left">
                
                <div class="lg:flex gap-2 items-center">
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
            <div class="flex justify-end mb-4">
                <a href="{{ url('admin/diagnostico/edit/'.$diagnostico->id.'/recursos') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Recursos</a>
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
            
            {{-- <div class="mermaid">

                {!! $estructura_organizativa !!}

            </div> --}}

            {{-- reportaje fotografico --}}
            <div class="mt-6 border bg-white rounded-lg p-4">
                <div class="text-gray-900 text-lg font-bold text-center">
                    REPORTAJE FOTOGRAFICO
                </div>

                <div>
                    <div class="lg:max-w-md mb-2">
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
                    DESCRIPCIÓN GENERAL DE LA INFORMACIÓN
                </div>

                {{-- Add flujo PC --}}
                <div class="md:flex row gap-2 space-y-3 md:space-y-0 mb-2 items-center mt-4 hidden sm:block">
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
                {{-- en add flujo PC --}}

                {{-- Add flujo mobile --}}
                <div class="flex row gap-2 mb-2 items-center mt-4 sm:hidden">
                    <div class="w-80">
                        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-500 uppercase">Flujo</label>
                        <input wire:model="f_descripcion" type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                   
                    <div class="pt-7">
                        <button wire:click="createFlujo" type="button" id="createFlujo" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium text-sm px-3 py-2.5 dark:bg-gray-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </div>
                </div>
                {{-- end add flujo mobile --}}

                {{-- flujos foreach PC --}}
                <div class="hidden sm:block">
                    @foreach ($flujos as $item)
                        <div class="border mb-4">
                            <div class="flex justify-between border-b bg-gray-50">
                                <div class="p-2 font-medium">
                                    {{-- @if($editFlujo)
                                        <input wire:model="editDescription" type="text" name="entrada_proveedor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    @else
                                        {{ $item->descripcion }}
                                    @endif --}}
                                    {{ $item->descripcion }}
                                </div>
                                <div class="basis-1/4 px-4 py-2 text-end">
                                    <button class="text-blue-500 inline-flex border border-blue-500 rounded px-2 py-0.1 hover:bg-blue-50 focus:ring-2 focus:ring-blue-100" wire:click="updateFlujoShowModal({{ $item->id }})"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg> 
                                          
                                        Editar
                                    </button>
                                   
                                    <button class="text-red-500 inline-flex border border-red-500 rounded px-2 py-0.1 hover:bg-red-50" wire:click="deleteFlujoShowModal({{ $item->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Eliminar
                                    </button>
                                </div>
                            </div>
                            <div>
                                {{-- caracteristia de los flujos --}}
                                <div class="p-2">
                                    {{-- <div class="text-gray-900 text-sm text-center">
                                        PRINCIPALES CARACTERÍSTICAS
                                    </div> --}}
    
                                    <div class="relative overflow-x-auto">
                                        
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                                <tr class="border">
                                                    <th scope="col" class="px-3 py-1">
                                                        Entrada / Proveedor
                                                    </th>
                                                    <th scope="col" class="px-3 py-1">
                                                        Tratamiento
                                                    </th>
                                                    <th scope="col" class="px-3 py-1">
                                                        Salida / Cliente
                                                    </th>
                                                    <th scope="col" class="px-3 py-1">
                                                        SIG
                                                    </th>
                                                    <th scope="col" class="px-3 py-1">
                                                        Comentario
                                                    </th>
                                                    <th scope="col" class="px-3 py-1">
                                                        
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($caracteristicas->where('flujo_id', $item->id) as $item)
                                                    <tr class="bg-white border dark:border-gray-700 hover:bg-gray-50">
                                                    
                                                        <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $item->entrada_proveedor }}
                                                        </th>
                                                        <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $item->tratamiento }}
                                                        </th>
                                                        <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $item->salida_cliente }}
                                                        </th>
                                                        <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            @if ($item->sig == true)
                                                                Si
                                                            @else
                                                            @endif
                                                        </th>
                                                        <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $item->comentario }}
                                                        </th>
                                                    
                                                        <td class="px-2 py-1">
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
                                
                            </div>
                            
                        </div>
                    @endforeach
                    {{-- end flzujos foreach PC --}}
                </div>

            </div>
            {{-- flujos foreach Mobile --}}
            <div class="border-b sm:hidden">
                @foreach ($flujos as $item)
                   <div class="flex bg-white p-2 shadow-lg mb-2 items-center border-l-2 border-l-blue-500 mt-4">
                       <div class="font-medium w-80">
                           <div class="w-full truncate">
                               {{ $item->descripcion }}
                           </div>
                           <div class="text-sm text-gray-500">
                               @if ($caracteristicas->where('flujo_id', $item->id)->count() <= 1)
                                   {{ $caracteristicas->where('flujo_id', $item->id)->count() }} caracteristica
                               @elseif ($caracteristicas->where('flujo_id', $item->id)->count() >= 1)
                                   {{ $caracteristicas->where('flujo_id', $item->id)->count() }} caracteristicas
                               @endif
                           </div>
                       </div>
                       <div class="basis-1/4 text-end">
                           <button class="text-blue-500 inline-flex border border-blue-500 rounded px-2 py-0.1 hover:bg-blue-50 focus:ring-2 focus:ring-blue-100" wire:click="updateFlujoShowModal({{ $item->id }})"> 
                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                   <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                               </svg> 
                           </button>
                          
                           <button class="text-red-500 inline-flex border border-red-500 rounded px-2 py-0.1 hover:bg-red-50" wire:click="deleteFlujoShowModal({{ $item->id }})">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                   <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                               </svg>
                           </button>
                       </div>
                   </div>
                @endforeach
               {{-- end flujos foreach Mobile --}}
            </div>


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

            <div class="flex justify-center mt-4">
                <button wire:click="update" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Guardar todo</button>
            </div>

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

    {{-- Formulario para flujo --}}
    <x-jet-dialog-modal wire:model="modalFormVisible" maxWidth="5xl">
        <x-slot name="title">
            {{ __('Flujo') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
                <x-jet-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                    wire:model.debounce.500ms="f_descripcion" />
                @error('nombre')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="border-t mt-4 uppercase text-gray-500 text-xs pt-4">
                Fomulario Caracteristica del Flujo
            </div>
            {{-- form caracteristicas --}}
            <div class="md:flex row gap-2 space-y-3 md:space-y-0 mb-2 mt-4 items-end">
                <input wire:model="flujo_id" type="integer" value="{{ $flujo_id }}" hidden>
                <div class="basis-1/2">
                    <label for="entrada_proveedor" class="block mb-2 text-xs text-gray-900 dark:text-white">ENTRADA / PROVEEDOR</label>
                    <input wire:model="entrada_proveedor" type="text" name="entrada_proveedor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div class="basis-1/2">
                    <label for="tratamiento" class="block mb-2 text-xs text-gray-900 dark:text-white">TRATAMIENTO</label>
                    <input wire:model="tratamiento" type="text" name="tratamiento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div class="basis-1/4">
                    <label for="salida_cliente" class="block mb-2 text-xs text-gray-900 dark:text-white">SALIDA / CLIENTE</label>
                    <input wire:model="salida_cliente" type="text" name="salida_cliente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div class="">
                    <div class="">
                        <button wire:click="createCaracteristica" type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium text-sm px-3 py-1.5 focus:outline-none">Agregar</button>
                    </div>
                </div>
            </div>
            {{-- end form caracteristicas --}}

            {{-- caracteristia de los flujos --}}
            <div class="">
                <div class="relative overflow-x-auto">
                    
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr class="border">
                                <th scope="col" class="px-3 py-1">
                                    Entrada / Proveedor
                                </th>
                                <th scope="col" class="px-3 py-1">
                                    Tratamiento
                                </th>
                                <th scope="col" class="px-3 py-1">
                                    Salida / Cliente
                                </th>
                                <th scope="col" class="px-3 py-1">
                                    SIG
                                </th>
                                <th scope="col" class="px-3 py-1">
                                    Comentario
                                </th>
                                <th scope="col" class="px-3 py-1">
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($caracteristicas->where('flujo_id', $flujo_id) as $item)
                                <tr class="bg-white border dark:border-gray-700 hover:bg-gray-50">
                                
                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->entrada_proveedor }}
                                    </th>
                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->tratamiento }}
                                    </th>
                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->salida_cliente }}
                                    </th>
                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($item->sig == true)
                                            Si
                                        @else
                                        @endif
                                    </th>
                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->comentario }}
                                    </th>
                                
                                    <td class="px-2 py-1">
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
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible'), resetFDescription" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            @if ($flujo_id)
                <x-jet-button class="ml-3" wire:click="updateFlujo" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-button>
            @else
                <x-jet-button class="ml-3" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-jet-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Eliminar Flujo --}}
    <x-jet-dialog-modal wire:model="modalConfirmDeleteFlujo">
        <x-slot name="title">
            {{ __('Eliminar Flujo') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Estas seguro que deseas eliminar este Flujo.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteFlujo')" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="deleteFlujo" wire:loading.attr="disabled">
                {{ __('Eliminar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Editar caracteristica --}}
    <x-jet-dialog-modal wire:model="modalCaracteristicaFormVisible">
        <x-slot name="title">
            {{ __('Editar Caracteristica') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="entrada_proveedor" value="{{ __('Entrada / Proveedor') }}" />
                <x-jet-input id="entrada_proveedor" class="block mt-1 w-full" type="text" name="entrada_proveedor"
                    wire:model.debounce.500ms="entrada_proveedor" />
                @error('entrada_proveedor')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="tratamiento" value="{{ __('Tratamiento') }}" />
                <x-jet-input id="tratamiento" class="block mt-1 w-full" type="text" name="tratamiento"
                    wire:model.debounce.500ms="tratamiento" />
                @error('tratamiento')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="salida_cliente" value="{{ __('Salida / Cliente') }}" />
                <x-jet-input id="salida_cliente" class="block mt-1 w-full" type="text" name="salida_cliente"
                    wire:model.debounce.500ms="salida_cliente" />
                @error('salida_cliente')
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
                <x-jet-label for="comentario" value="{{ __('Comentario') }}" />
                <x-jet-input id="comentario" class="block mt-1 w-full" type="text" name="comentario"
                    wire:model.debounce.500ms="comentario" />
                @error('comentario')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalCaracteristicaFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            @if ($caracteristicaId)
                <x-jet-button class="ml-3" wire:click="updateCaracteristica" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-button>
            @else
                <x-jet-button class="ml-3" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-jet-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Eliminar Caracteristica --}}
    <x-jet-dialog-modal wire:model="modalConfirmDeleteCaracteristica">
        <x-slot name="title">
            {{ __('Eliminar Caracteristica') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Estas seguro que deseas eliminar este Caracteristica.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteCaracteristica')" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="deleteCaracteristica" wire:loading.attr="disabled">
                {{ __('Eliminar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
