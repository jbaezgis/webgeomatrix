@section('title', $diagnostico->oficina)
<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2 py-2 bg-white">
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
    
                <div class="text-end mt-4">
                    <div>{{ date('j/m/Y', strtotime($diagnostico->fecha)) }}</div>
                    <div class="text-sm text-gray-500">Version: {{ $diagnostico->version }}</div>
                </div>
            </div>
        </div>

        <div class="border-t my-4"></div>

        <div class="px-2">
            <div class="font-bold text-gray-700">OBJETIVOS Y ACTIVIDADES</div>
            <div class="text-gray-700">{{ $diagnostico->objetivos_actividades }}</div>
        </div>

        <div class="px-2 mt-6">
            <div class="font-bold text-gray-700">ESTRUCTURA ORGANIZATIVA</div>
            <div class="text-gray-700">{{ $diagnostico->estructura_organizativa }}</div>
        </div>

        <div class="px-2 mt-6">
            <div class="font-bold text-gray-700">REPORTAJE FOTOGRAFICO</div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                @foreach ($images as $item)
                <div class="w-full max-w-7xl mx-auto">
                    <div class="relative">
                        <div>
                            <img class="" src="{{ Storage::url($item->url) }}" alt="">
                        </div>
                        {{-- <div class="absolute bottom-1 flex gap-2 px-2">
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
                        </div> --}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="px-2 mt-6">
            <div class="font-bold text-gray-700">OBSERVACIONES GENERALES</div>
            <div class="">{{ $diagnostico->observaciones_generales }}</div>
        </div>

        <div class="px-2 mt-6 border-t pt-4">
            <div class="mb-4">
                <div class="text-gray-900 text-lg font-bold text-center">
                    PRINCIPALES FLUJOS DE INFORMACIÓN
                </div>
                <div class="text-gray-700 text-center">
                    DESCRIPCIÓN GENERAL DE LA INFORMACIÓN
                </div>
            </div>

            <div>
                <ol class="list-decimal pl-4 space-y-4">
                    @foreach ($flujos as $item)
                    <li class="font-medium">{{ $item->descripcion }}</li>
                    <ul class="list-disc list-outside pl-4">
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
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </ul>
                    @endforeach
                </ol>
            </div>
        </div>

        <div class="px-2 mt-6 border-t pt-6">
            <div class="font-bold text-gray-700">OBSERVACIONES SOBRE LOS MEDIOS DISPONIBLES PARA EL TRATAMIENTO DE INFORMACIÓN</div>
            <div class="">{{ $diagnostico->observaciones_generales }}</div>
        </div>

        <div class="px-2 mt-6 border-t pt-4 mb-8">
            <div class="mb-4">
                <div class="text-gray-900 text-lg font-bold text-center">
                    RECURSOS DISPONIBLES
                </div>
            </div>

            <div>
                <ol class="list-decimal pl-4 space-y-4">
                    @foreach ($recursos as $item)
                    <li class="font-medium">{{ $item->equipo }} {{ $item->marca_modelo }} 
                        <span class="text-sm text-gray-600"> -
                            {{ $item->capacidades ? '' . $item->capacidades . ',':'' }} {{ $item->red_servidor == true ? 'acceso a la red' : ''  }} {{ $item->acceso_internet == true ? ', acceso a internet' : ''  }}, Asignado a: {{ $item->personal_asignado }}
                        </span>
                    </li>
                        @if ($softwares->where('recurso_id', $item->id)->count())
                            <ul class="list-disc list-outside pl-4">
                                <div class="relative overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                                            @foreach ($softwares->where('recurso_id', $item->id) as $item)
                                                <tr class="bg-white border dark:border-gray-700 hover:bg-gray-50">
                                                
                                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $item->aplicacion }}
                                                    </th>
                                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $item->desarrollador }}
                                                    </th>
                                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $item->tipo_licencia }}
                                                    </th>
                                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $item->uso }}
                                                    </th>
                                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $item->frecuencia_uso }}
                                                    </th>
                                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $item->personal_asignado }}
                                                    </th>
                                                
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </ul>
                        @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
