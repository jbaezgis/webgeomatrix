<x-app-layout>
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
            
        </div>
    </div>
</x-app-layout>