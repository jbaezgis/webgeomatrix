@section('title', $diagnostico->oficina)
<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2 py-2 bg-white">
        <div class="lg:flex gap-2 items-center">

            <div class="lg:flex justify-between flex-1 lg:w-64 text-center lg:text-left">
                
                <div class="lg:flex gap-2 items-center">
                    <div><h1 class="font-semibold text-xl text-gray-800 leading-tight">{{ $diagnostico->oficina }}</h1></div>
                    <div class="text-gray-600">(Responsable: {{ $diagnostico->responsable }})</div>
                </div>
    
                <div class="text-end mt-4">
                    <div>{{ date('j/m/Y', strtotime($diagnostico->fecha)) }}</div>
                    {{-- <div class="text-sm text-gray-500">Version: {{ $diagnostico->version }}</div> --}}
                </div>
            </div>
        </div>

        <div class="border-t my-4"></div>

        <div class="px-2">
            <div class="font-bold text-gray-700">OBJETIVOS Y ACTIVIDADES</div>
            <div class="text-gray-700 whitespace-pre-line">{{ $diagnostico->objetivos_actividades }}</div>
        </div>

        <div class="px-2 mt-6">
            <div class="font-bold text-gray-700">ESTRUCTURA ORGANIZATIVA</div>
            {{-- <div class="text-gray-700">{{ $diagnostico->estructura_organizativa }}</div> --}}
            <div class="mermaid">

                {!! $diagnostico->estructura_organizativa !!}

            </div>
        </div>

        <div class="px-2 mt-6">
            <div class="font-bold text-gray-700">REPORTAJE FOTOGRAFICO</div>
            <div class="grid grid-cols-2 gap-2">
                @foreach ($images as $item)
                <div>
                    <img class="" src="{{ asset('storage/'.$item->url) }}" alt="">
                </div>
                   
                @endforeach
            </div>
        </div>

        <div class="px-2 mt-6">
            <div class="font-bold text-gray-700">OBSERVACIONES GENERALES</div>
            <div class="whitespace-pre-line">{{ $diagnostico->observaciones_generales }}</div>
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
                    <div>
                        <div class="text-xl py-2 font-bold">{{ $item->descripcion }}</div>
                        <div>
                            <table class="w-full text-sm text-left text-gray-500 table-auto">
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
                                        
                                            <th scope="row" class="px-2 py-1 font-medium text-gray-900 dark:text-white">
                                                {{ $item->entrada_proveedor }}
                                            </th>
                                            <th scope="row" class="px-2 py-1 font-medium text-gray-900 dark:text-white">
                                                {{ $item->tratamiento }}
                                            </th>
                                            <th scope="row" class="px-2 py-1 font-medium text-gray-900 dark:text-white">
                                                {{ $item->salida_cliente }}
                                            </th>
                                            <th scope="row" class="px-2 py-1 font-medium text-gray-900 dark:text-white">
                                                @if ($item->sig == true)
                                                    Si
                                                @else
                                                @endif
                                            </th>
                                            <th scope="row" class="px-2 py-1 font-medium text-gray-900 dark:text-white">
                                                {{ $item->comentario }}
                                            </th>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                    @endforeach
                </ol>
            </div>
        </div>

        <div class="px-2 mt-6 border-t pt-6">
            <div class="font-bold text-gray-700">OBSERVACIONES SOBRE LOS MEDIOS DISPONIBLES PARA EL TRATAMIENTO DE INFORMACIÓN</div>
            <div class="whitespace-pre-line">{{ $diagnostico->observaciones_medios }}</div>
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
                                    <table class="text-sm text-left text-gray-500 dark:text-gray-400 table-auto">
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
