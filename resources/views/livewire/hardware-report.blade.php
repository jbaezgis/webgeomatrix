<div>
    <div class="max-w-7xl mx-auto px-2 py-6">
        <div class="flex justify-between pb-6">
            <div class="text-3xl">Reporte de Hardware</div>
        </div>

        @foreach ($diagnosticos as $diagnostico)
            <div class="mb-10">
                <div>
                    <h2 class="text-2xl text-gray-600">
                        Oficina: <span class="font-bold text-gray-700">{{ $diagnostico->oficina }}</span>
                    </h2>
                </div>
                
                <div>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">Equipo</th>
                                <th class="p-4">Marca y Modelo</th>
                                <th class="p-4">Capacidades</th>
                                <th class="p-4">Red y servidor</th>
                                <th class="p-4">Acceso a Internet</th>
                                <th class="p-4">Personal asignado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recursos->where('diagnostico_id', $diagnostico->id) as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">{{ $item->equipo }} {{ $item->id }}</td>
                                    <td class="w-4 p-4">{{ $item->marca_modelo }}</td>
                                    <td class="w-4 p-4">{{ $item->capacidades }}</td>
                                    <td class="w-4 p-4">{{ $item->red_servidor == true ? 'Si' : 'No'  }}</td>
                                    <td class="w-4 p-4">{{ $item->acceso_internet == true ? 'Si' : 'No'  }}</td>
                                    <td class="w-4 p-4">{{ $item->personal_asignado }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>                        
                </div>
            </div>
        @endforeach
    </div>
</div>
