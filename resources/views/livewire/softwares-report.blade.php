<div>
    <div class="max-w-7xl mx-auto px-2 py-6">
        <div class="flex justify-between pb-6">
            <div class="text-3xl">Reporte de Softwares</div>
        </div>

        @foreach ($diagnosticos as $diagnostico)
            <div class="border-t py-4"></div>
            <div class="mb-10">
                <div>
                    <h2 class="text-2xl text-gray-600">
                        Oficina: <span class="font-bold text-gray-700">{{ $diagnostico->oficina }}</span>
                    </h2>
                </div>
                
                <div>
                    @foreach ($recursos->where('diagnostico_id', $diagnostico->id) as $recurso)
                        <div class="py-4 text-lg font-bold">{{ $recurso->equipo }} {{ $recurso->id }}</div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">Equipo</th>
                                    <th class="p-4">Aplicación</th>
                                    <th class="p-4">Desarrollador</th>
                                    <th class="p-4">Tipo de Licencia</th>
                                    <th class="p-4">Uso</th>
                                    <th class="p-4">Frecuencia de uso</th>
                                    <th class="p-4">Personal asignado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($softwares->where('recurso_id', $recurso->id) as $item)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">{{ $item->recurso->equipo }} {{ $item->recurso->id }}</td>
                                        <td class="w-4 p-4">{{ $item->aplicacion }}</td>
                                        <td class="w-4 p-4">{{ $item->desarrollador }}</td>
                                        <td class="w-4 p-4">{{ $item->tipo_licencia }}</td>
                                        <td class="w-4 p-4">{{ $item->uso }}</td>
                                        <td class="w-4 p-4">{{ $item->frecuencia_uso }}</td>
                                        <td class="w-4 p-4">{{ $item->personal_asignado }}</td>
                                        <div>
    
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                                      
                </div>
            </div>
        @endforeach
    </div>
</div>
