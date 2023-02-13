@section('title', "GTS")
<div>
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-2 py-6">
            <div class="md:grid md:grid-cols-2">
                <div>
                    <div class="flex justify-center">
                        <img class="h-20 w-20" src="{{ asset('images/icons/gts.png') }}" alt="">
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold py-4 text-center text-green-500">
                            Geomatrix GTS
                        </h1>
                        <p class="text-lg text-gray-600 text-center">
                            GTS, provee las soluciones perfecta para la administración de su flotilla de 
                            vehículos con nuestro sistema totalmente web le permite rastrear su vehículo en tiempo 
                            real las 24 horas del día, a través de su smartphone o computadora.
                        </p>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('images/devices.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    {{-- Rastreo --}}
    <div class="bg-green-50">
        <div class="max-w-7xl mx-auto px-2">
            <div class="px-2 py-12">
                <div class="">
                    <img src="{{ asset('images/icons/map-marker.png') }}" alt="">
                </div>
                <h3 class="font-semibold text-green-500 py-4">Rastreo en Tiempo Real</h3>
                <h3 class="text-3xl font-bold text-gray-700">
                    Localización exacta de su Vehículo o Flotilla en tiempo real a través de nuestros
                    dispositivos de GPS/GPRS.
                </h3>
                <p class="text-lg text-gray-700 py-4">
                    Nuestros dispositivos tienen batería de respaldo de hasta 24 horas.
                </p>
            </div>
        </div>
    </div>

    {{-- Alerts --}}
    <div class="bg-sky-50">
        <div class="max-w-7xl mx-auto px-2">
            <div class="px-2 py-12">
                <div class="">
                    <img src="{{ asset('images/icons/alerts.png') }}" alt="">
                </div>
                <h3 class="font-semibold text-sky-500 py-4 ">Alertas y Notificaciones</h3>
                <h3 class="text-3xl font-bold text-gray-700 ">
                    Geomatrix GTS proporciona notificaciones web instantáneas junto con soporte para correo electrónico y SMS.
                </h3>
                <div class="text-lg text-gray-700 py-4 ">
                    <ul class="list-disc space-y-4">
                        <li>Notificación instantánea de eventos por velocidad excedida, traspaso de fronteras e incumplimiento de rutas.</li>
                        <li>Detección automática de llegadas, salidas y paradas en diferentes puntos de un recorrido.</li>
                        <li>Aviso por paradas prolongadas.</li>
                        <li>Aviso por frenado brusco.</li>
                        <li>Notificación de batería baja y batería desconectada.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Reportes --}}
    <div class="bg-yellow-50">
        <div class="max-w-7xl mx-auto px-2">
            <div class="px-2 py-12">
                <div class="flex">
                    <img src="{{ asset('images/icons/reports.png') }}" alt="">
                </div>
                <h3 class="font-semibold text-yellow-500 py-4">Reportes</h3>
                <h3 class="text-3xl font-bold text-gray-700">
                    Geomatrix GTS admite reportes sencillos de historial de ubicaciones, viajes, gráficos y resúmenes con almacenamiento de hasta 12 meses.
                </h3>
                <div class="text-lg text-gray-700 py-4">
                    <ul class="list-disc space-y-4">
                        <li>Reporte de consumo de combustible por kilómetros recorridos.</li>
                        <li>Control de mantenimientos automáticos por horas de operación o Kms recorridos.</li>
                        <li>Reproducción de recorridos de manera fácil.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- otras funciones --}}
    <div class="bg-white">
        <div class="max-w-4xl mx-auto px-2 py-12">
            <div class="md:grid md:grid-cols-2 gap-4 py-6 space-y-6">
                <div>
                    <div class="flex justify-center">
                        <img src="{{ asset('images/icons/database.png') }}" alt="">
                    </div>
                    <h3 class="font-semibold text-gray-700 py-2 text-center">Almacenamiento</h3>
                    <p class="text-gray-500 text-center">
                        Nuestro sistema tiene la capacidad de almacenamiento de datos de hasta 12 meses.
                    </p>
                </div>
                
                <div>
                    <div class="flex justify-center">
                        <img class="" src="{{ asset('images/icons/seguridad.png') }}" alt="">
                    </div>
                    <h3 class="font-semibold text-gray-700 py-2 text-center">Seguridad</h3>
                    <p class="text-gray-500 text-center">
                        Nuestro sistema facilita la detección de fraudes como uso sin autorización, kilometraje innecesario, tiempo del vehículo encendido sin movimiento.
                    </p>
                </div>

                
            </div>

            <div class="flex justify-center py-6">
                <div class="">
                    <div class="flex justify-center">
                        <img class="h-16" src="{{ asset('images/icons/geocercas.png') }}" alt="">
                    </div>
                    <h3 class="font-semibold text-gray-700 py-2 text-center">Geocercas</h3>
                    <p class="text-gray-500 text-center">
                        Delimitación de zonas de trabajo y rutas específicas.
                    </p>
                </div>

            </div>
        </div>
    </div>

</div>
