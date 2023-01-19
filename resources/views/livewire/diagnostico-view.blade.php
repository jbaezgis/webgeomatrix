@section('title', $diagnostico->oficina)
<div>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2 bg-white mt-2">
        <div class="flex justify-between items-center border-b">
            <div class="py-2"><img class="h-12" src="{{ asset('images/logo-bpp.png') }}" alt=""></div>
            <div class="py-2 text-xl text-bold">FICHA DE CARACTERIZACIÓN</div>
            <div class="flex px-2 py-2 gap-2">
                
                <div class="text-gray-700 font-medium"><span class="text-gray-500">Fecha:</span>  {{ date('j/m/Y', strtotime($diagnostico->fecha)) }}</div>
                <div class="text-gray-700 font-medium"><span class="text-gray-500">Version:</span>  {{ $diagnostico->version }}</div>
            </div>
        </div>

        <div class="text-center py-4">
            <div class="text-2xl font-bold">{{ $diagnostico->oficina }}</div>
            <div class="text-gray-700 font-medium text-lg"><span class="text-gray-500">Responsable:</span>  {{ $diagnostico->responsable }}</div>
        </div>

        <div>
            <div class="text-gray-900 font-bold">OBJETIVOS Y ACTIVIDADES</div>
            <div>{{ $diagnostico->objetivos_actividades }}</div>
        </div>
    </div>
</div>
