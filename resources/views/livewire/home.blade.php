@section('title', __('Home'))
<div>
    <div class="bg-[url('{{ asset('images/feature-bg1.jpg') }}')]" 
        style="background-image: url({{ 'images/feature-bg1.jpg' }}); 
        width: 100%; 
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;">
        <div class="max-w-7xl mx-auto py-20 px-2 lg:px-8 rounded-lg text-white text-center">
            <div class="text-3xl md:text-6xl font-bold">Geomatrix</div>
            <div class="text-xl md:text-2xl">Ofrecemos soluciones funcionales, ágiles y adaptables al cambio.</div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mt-4 ">
        <div class="text-3xl mb-4 px-2">Servicios</div>
        <div class=" text-gray-700 px-2 mb-4">
            GEOMATRIX ofrece servicios de consultoría en el campo de proyectos de desarrollo sostenible bajo las siguientes categorías: 
        </div>

        <div class="py-8 text-center bg-green-200 mx-2 rounded mb-2">
            <div class="flex justify-center"><img class="h-16 w-16" src="{{ asset('images/icons/gts.png') }}" alt=""></div>
            <h3 class="text-lg font-semibold text-gray-900 py-2">Rastreo Satelital</h3>
            <p>Producto aplicado a control de flotillas y monitoreo de brigadas de campo.</p>
            <div class="pt-4">
                <a href="#" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Más información</a>
            </div>
        </div>

        <div class="grid gap-2 mb-8 mx-2 md:mb-12 md:grid-cols-2 lg:grid-cols-3">
            <figure class="flex flex-col justify-center rounded p-8 bg-white">
                <blockquote class="max-w-2xl text-gray-500">
                    {{-- <div class="flex justify-center">
                        <img class="" src="{{ asset('images/icons/analisis.png') }}" alt="">
                    </div> --}}
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Preparación de Programas</h3>
                    <p class="font-light">Proporciona la asesoría y los servicios necesarios para la preparación de programas de inversión: desde estudios generales y sectoriales para la identificación de programas, hasta la elaboración de todos los estudios técnicos requeridos.</p>
                </blockquote> 
            </figure>
            <figure class="flex flex-col justify-center p-8 bg-white">
                <blockquote class="max-w-2xl text-gray-500">
                    {{-- <img class="" src="{{ asset('images/icons/asesoria.png') }}" alt=""> --}}
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Administración y Seguimiento de Proyectos</h3>
                    <p class="font-light">Se responsabiliza por la ejecución de proyectos, ahorrando de esta manera valiosos recursos a empresas públicas y privadas. Esto incluye asistencia y seguimiento en programas sectoriales y monitoreo ambiental.</p>
                </blockquote>
                
            </figure>
            <figure class="flex flex-col justify-center p-8 bg-white">
                <blockquote class="max-w-2xl text-gray-500">
                    {{-- <img class="" src="{{ asset('images/icons/capacitacion.png') }}" alt=""> --}}
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Planificación y Desarrollo</h3>
                    <p class="font-light">Coordina la realización de diagnósticos y suministra servicios de diseño de sistemas geomáticos con objetivos de desarrollo, para entidades públicas y privadas con funciones de ejecución y operación de proyectos. </p>
                </blockquote>
                
            </figure>
            <figure class="flex flex-col p-8 bg-white border-gray-200">
                <blockquote class="max-w-2xl text-gray-500">
                    {{-- <img class="" src="{{ asset('images/icons/catastro.png') }}" alt=""> --}}
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Desarrollo de sistemas de información geográfica (SIG)</h3>
                    <p class="font-light">Ha diseñado y desarrollado sistemas orientados al planeamiento físico, definición de trayectorias de líneas de transmisión, gestión ambiental, ordenamiento territorial en diferentes sectores.</p>
                </blockquote>
                
            </figure>
            <figure class="flex flex-col p-8 bg-white border-gray-200">
                <blockquote class="max-w-2xl text-gray-500">
                    {{-- <img class="" src="{{ asset('images/icons/diagnostico.png') }}" alt=""> --}}
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Capacitación</h3>
                    <p class="font-light">Acompaña sus consultorías, con reuniones de coordinación, de presentación de resultados y de trabajo integrado de manera que las consultorías tienen un componente de capacitación y transferencia de conocimientos intrínsecos.  Adicionalmente hemos efectuado proyectos de capacitación específica a instituciones como el Programa de Modernización de la Jurisdicción de Tierras, el Consejo Nacional de Asuntos Urbanos, Ayuntamiento de Santiago de Los Caballeros, entre otras. </p>
                </blockquote>
                
            </figure>
            <figure class="flex flex-col p-8 bg-white border-gray-200">
                <blockquote class="max-w-2xl text-gray-500">
                    {{-- <img class="" src="{{ asset('images/icons/levantamiento.png') }}" alt=""> --}}
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Investigación</h3>
                    <p class="font-light">Puede formar y coordinar grupos constituidos por expertos en diferentes campos para estudiar problemas específicos de apoyo a objetivos concretos en desarrollo y fortalecimiento institucional y económico, planificación de inversiones, solución de problemas técnicos, adaptación de tecnologías y evaluación de impactos ambientales y socio-culturales. </p>
                </blockquote>
                
            </figure>
            <figure class="flex flex-col p-8  bg-white border-gray-200">
                <blockquote class="max-w-2xl text-gray-500">
                    {{-- <img class="" src="{{ asset('images/icons/soluciones.png') }}" alt=""> --}}
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Estudios Básicos en Proyectos de Inversión y Desarrollo</h3>
                    <p class="font-light">Contamos con personal especializado para soporte técnico a equipos multidisciplinarios en una amplia gama de estudios y consultorías.</p>
                    <p class="pt-2">
                        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                            <li>Estudios Ambientales.</li>
                            <li>Estudios Socioeconómicos. </li>
                            <li>Estudios de Caracterización Biofísica.</li>
                            <li>Proyectos de Inversión y Desarrollo. </li>
                            <li>Estudios de Mercado.</li>
                            <li>Ordenamiento Territorial.</li>
                            <li>Planeamiento Urbano. </li>
                            <li>Paisajismo.</li>
                        </ul>
                    </p>
                </blockquote>
                
            </figure>

            <figure class="flex flex-col p-8  bg-white border-gray-200">
                <blockquote class="max-w-2xl text-gray-500">
                    {{-- <img class="" src="{{ asset('images/icons/soluciones.png') }}" alt=""> --}}
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Diagnósticos y Evaluaciones</h3>
                    {{-- <p class="font-light">Contamos con personal especializado para soporte técnico a equipos multidisciplinarios en una amplia gama de estudios y consultorías.</p> --}}
                    <p class="pt-2">
                        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                            <li>Planificación Física Territorial.</li>
                            <li>Mapeo de Características de Suelo. </li>
                            <li>Diseño de Sistemas de Riego y Drenaje.</li>
                            <li>Supervisión y Fiscalización de Proyectos. </li>
                            <li>Gestión de Riesgos.</li>
                        </ul>
                    </p>
                </blockquote>
                
            </figure>

            <figure class="flex flex-col p-8  bg-white border-gray-200">
                <blockquote class="max-w-2xl text-gray-500">
                    {{-- <img class="" src="{{ asset('images/icons/soluciones.png') }}" alt=""> --}}
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Soluciones Tecnológicas</h3>
                    {{-- <p class="font-light">Contamos con personal especializado para soporte técnico a equipos multidisciplinarios en una amplia gama de estudios y consultorías.</p> --}}
                    <p class="pt-2">
                        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                            <li>Diseño e Implementación de Módulos Geográficos Automatizados.</li>
                            <li>Sistemas de Información Geográfica. </li>
                            <li>Bases de Datos Cartográficas.</li>
                            <li>Aplicaciones de Captura Móvil/GPS.</li>
                            <li>Sistemas de Información Territorial. </li>
                            <li>Geoportales.</li>
                        </ul>
                    </p>
                </blockquote>
                
            </figure>

            <figure class="flex flex-col p-8  bg-white border-gray-200">
                <blockquote class="max-w-2xl text-gray-500">
                    {{-- <img class="" src="{{ asset('images/icons/soluciones.png') }}" alt=""> --}}
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Levantamientos Topográficos y Cartografía</h3>
                    {{-- <p class="font-light">Contamos con personal especializado para soporte técnico a equipos multidisciplinarios en una amplia gama de estudios y consultorías.</p> --}}
                    <p class="pt-2">
                        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                            <li>Planimetría. </li>
                            <li>Altimetría. </li>
                            <li>Modelos Digitales del Terreno.</li>
                            <li>Geoprocesamientos. </li>
                            <li>Construcción de Plataformas Geomáticas.</li>
                        </ul>
                    </p>
                </blockquote>
                
            </figure>

            <figure class="flex flex-col p-8 bg-white border-gray-200">
                <blockquote class="max-w-2xl text-gray-500">
                    {{-- <img class="" src="{{ asset('images/icons/soluciones.png') }}" alt=""> --}}
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Catastro y Mensuras</h3>
                    {{-- <p class="font-light">Contamos con personal especializado para soporte técnico a equipos multidisciplinarios en una amplia gama de estudios y consultorías.</p> --}}
                    <p class="pt-2">
                        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                            <li>Mediciones de Alta Precisión. </li>
                            <li>Verificaciones de Área. </li>
                            <li>Tasaciones.</li>
                        </ul>
                    </p>
                </blockquote>
                
            </figure>

            <figure class="flex flex-col p-8  bg-white border-gray-200">
                <blockquote class="max-w-2xl text-gray-500">
                    {{-- <img class="" src="{{ asset('images/icons/soluciones.png') }}" alt=""> --}}
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Asesorías Especiales</h3>
                    <p class="font-light">Asesorías personalizadas para evaluación de necesidades e implementación de estrategias en los diversos componentes que integran las soluciones geomáticas:</p>
                    <p class="pt-2">
                        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                           <li>Adquisición de Equipos. </li>
                           <li>Recomendaciones y Adquisición de Softwares. </li>
                           <li>Adquisición de Imágenes y Fotografías Aéreas. </li>
                           <li>Adquisición de Cartografías. </li>
                           <li>Conformación de Estructura Institucional.</li>
                           <li>Análisis de Procesos. </li>
                        </ul>
                    </p>
                </blockquote>
                
            </figure>
        </div>
    </div>

    <div class="max-w-7xl mx-auto my-4 bg-green-100 p-6 rounded text-center">
        <h4 class="text-2xl font-bold">Solicite nuestro perfil.</h4>
        <p class="py-2 text-lg text-gray-700">Escríbenos a nuestro correo <a class="text-green-900" href = "mailto: info@geomatrixgts.com">info@geomatrixgts.com</a> y en breve estaremos en contacto para que pueda recibir nuestro perfil.</p>

        <p class="text-gray-700 font-bold text-lg">Muchas gracias por su interés.</p>

        {{-- <p class="lead">Envíenos Favor ingrese estos datos para recibir nuestro perfil completo. Muchas gracias por su interés.</p>
            
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>Sus datos se han enviado correctamente. </p>
            <p>En breve estaremos en contacto para que pueda recibir nuestro perfil. </p>
            <p>Agradecemos su interés.</p>
            <p>Para otras informaciones favor usar: <a href = "mailto: info@geomatrixgts.com">info@geomatrixgts.com</a></p>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> --}}
    </div>
</div>
