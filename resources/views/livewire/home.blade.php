@section('title', __('Home'))
<div>
    <div class="bg-[url('{{ asset('images/feature-bg1.jpg') }}')]" 
        style="background-image: url({{ 'images/feature-bg1.jpg' }}); 
        width: 100%; 
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;">
        <div class="max-w-7xl mx-auto py-20 px-2 lg:px-8 rounded-lg text-white">
            <div class="text-4xl font-bold">Geomatrix</div>
            <div class="text-xl">Ofrecemos soluciones funcionales, ágiles y adaptables al cambio.</div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mt-4">
        <div class="text-3xl text-center mb-4">Servicios</div>
        
        <div class="grid gap-2 mb-8 mx-2 md:mb-12 md:grid-cols-2 lg:grid-cols-3">
            <figure class="flex flex-col items-center justify-center rounded p-8 text-center bg-white">
                <blockquote class="max-w-2xl mx-auto text-gray-500">
                    <img class="" src="{{ asset('images/icons/analisis.png') }}" alt="">
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Servicio 1</h3>
                    <p class="font-light">Descripcion</p>
                </blockquote> 
            </figure>
            <figure class="flex flex-col items-center justify-center p-8 text-center bg-white">
                <blockquote class="max-w-2xl mx-auto text-gray-500">
                    <img class="" src="{{ asset('images/icons/asesoria.png') }}" alt="">
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Servicio 2</h3>
                    <p class="font-light">Descripcion</p>
                </blockquote>
                
            </figure>
            <figure class="flex flex-col items-center justify-center p-8 text-center bg-white">
                <blockquote class="max-w-2xl mx-auto text-gray-500">
                    <img class="" src="{{ asset('images/icons/capacitacion.png') }}" alt="">
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Servicio 3</h3>
                    <p class="font-light">Descripcion</p>
                </blockquote>
                
            </figure>
            <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-gray-200">
                <blockquote class="max-w-2xl mx-auto text-gray-500">
                    <img class="" src="{{ asset('images/icons/catastro.png') }}" alt="">
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Servicio 3</h3>
                    <p class="font-light">Descripcion</p>
                </blockquote>
                
            </figure>
            <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-gray-200">
                <blockquote class="max-w-2xl mx-auto text-gray-500">
                    <img class="" src="{{ asset('images/icons/diagnostico.png') }}" alt="">
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Servicio 3</h3>
                    <p class="font-light">Descripcion</p>
                </blockquote>
                
            </figure>
            <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-gray-200">
                <blockquote class="max-w-2xl mx-auto text-gray-500">
                    <img class="" src="{{ asset('images/icons/levantamiento.png') }}" alt="">
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Servicio 3</h3>
                    <p class="font-light">Descripcion</p>
                </blockquote>
                
            </figure>
            <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-gray-200">
                <blockquote class="max-w-2xl mx-auto text-gray-500">
                    <img class="" src="{{ asset('images/icons/soluciones.png') }}" alt="">
                    <h3 class="text-lg font-semibold text-gray-900 py-2">Servicio 3</h3>
                    <p class="font-light">Descripcion</p>
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
