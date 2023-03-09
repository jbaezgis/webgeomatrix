<div>
    <div class="max-w-7xl mx-auto px-2 py-6">
        <div class="flex justify-between pb-6">
            <div class="text-3xl">Resumen del flujo de la información</div>
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
                    @foreach ($flujos->where('diagnostico_id', $diagnostico->id) as $flujo)
                        <div class="py-4 text-lg font-bold">{{ $flujo->descripcion }}</div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">ENTRADA / PROVEEDOR</th>
                                    <th class="p-4">TRATAMIENTO</th>
                                    <th class="p-4">SALIDA / CLIENTE</th>
                                    <th class="p-4">SIG</th>
                                    <th class="p-4">COMENTARIO</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($caracteristicas->where('flujo_id', $flujo->id) as $item)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">{{ $item->entrada_proveedor }}</td>
                                        <td class="w-4 p-4">{{ $item->tratamiento }}</td>
                                        <td class="w-4 p-4">{{ $item->salida_cliente }}</td>
                                        <td class="w-4 p-4">
                                            @if ($item->sig == true)
                                                Si
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td class="w-4 p-4">{{ $item->comentario }}</td>
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
