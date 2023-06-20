<body class="row p-0 h-100 justify-content-center align-items-center bg-secondary-subtle" style="overflow-x: hidden ;">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.min.js"></script>


    <div class="d-flex text-center aling-items-center justify-content-center h-100 flex-column col-md-6 border px-0 position-relative"
        style="color: {{ $bimer->color_texto }} ;background-color: {{ $bimer->color_fondo }}; ">
        <section class="jumbotron position-relative mb-4"
            style=" background-color: {{ $bimer->color_texto }}; background-size: cover; background-position: center center; height: 200px;">
            <img class="rounded-circle position-absolute top-100 start-50 translate-middle object-fit-cover img-fluid"
                style="width: 8rem; height: 8rem;" id="foto_perfil" src="{{ asset($bimer->fichero->foto_perfil) }}">
        </section>

        <div class="w-100 h-100 pt-5 d-flex justify-content-center aling-items-center flex-column border-bottom">
            <h2 id="empresa">{{ $bimer->empresa }}</h2>
            <h1 id="nombre">{{ $bimer->nombre }} {{ $bimer->apellido }}</h1>
            <h3 id="puesto">{{ $bimer->puesto }}</h3>

            <div class="d-flex justify-content-center aling-items-center">
                <div class="d-flex flex-column px-3">
                    <a target="_blank" id="telefono" class="btn d-flex flex-column px-3"
                        style="color: {{ $bimer->color_texto }};background-color: {{ $bimer->color_fondo }}"
                        href="tel:{{ $bimer->telefono }}" role="button">
                        <i class="bi bi-telephone-fill"></i>
                        <p>Teléfono</p>
                    </a>
                </div>

                <div class="d-flex flex-column px-3">
                    <a target="_blank" id="correo" class="btn d-flex flex-column px-3"
                        style="color: {{ $bimer->color_texto }};background-color: {{ $bimer->color_fondo }}"
                        href="mailto:{{ $bimer->correo }}" role="button">
                        <i class="bi bi-envelope-fill"></i>
                        <p>Correo</p>
                    </a>
                </div>

                <div class="d-flex flex-column px-3">
                    <a target="_blank" id="agregar" class="btn d-flex flex-column px-3"
                        style="color: {{ $bimer->color_texto }};background-color: {{ $bimer->color_fondo }}"
                        role="button" onclick="confirmarDescarga()">
                        <i class="bi bi-person-fill-add"></i>
                        <p>Contacto</p>
                    </a>
                </div>

                <script>
                    function confirmarDescarga() {
                        var confirmacion = confirm("Business in Motion Studio dice: ¿Deseas descargar el contacto?");

                        if (confirmacion) {
                            descargarContacto();
                        }
                    }

                    function descargarContacto() {
                        var contactVcard = "BEGIN:VCARD\n" +
                            "VERSION:3.0\n" +
                            "N:{{ $bimer->apellido }};{{ $bimer->nombre }};;;\n" +
                            "FN:{{ $bimer->nombre }} {{ $bimer->apellido }}\n" +
                            "TEL;TYPE=CELL:{{ $bimer->telefono }}\n" +
                            "EMAIL;TYPE=WORK:{{ $bimer->correo }}\n" +
                            "END:VCARD";

                        var dataUrl = 'data:text/vcard;charset=utf-8,' + encodeURIComponent(contactVcard);

                        var downloadLink = document.createElement('a');
                        downloadLink.setAttribute('href', dataUrl);
                        downloadLink.setAttribute('download', '{{ $bimer->nombre }} {{ $bimer->apellido }}');
                        downloadLink.style.display = 'none';
                        document.body.appendChild(downloadLink);
                        downloadLink.click();
                        document.body.removeChild(downloadLink);
                    }
                </script>



            </div>

            <div class="container pt-3 py-3">
                <img id="qr" class="rounded mx-auto d-block" src="{{ asset($bimer->fichero->qrImg) }}"
                    style="padding: 10px; max-width: 70%;">
            </div>
            <br><br><br><br>
            <div class="elemento position-fixed bottom-0 start-50 translate-middle-x  d-flex flex-column col-12 col-md-6"
                style="z-index: 100;">
                <div class="d-flex justify-content-between m-2">
                    <div class=" d-flex dropdown-networks dropup ">
                        <button id="btn_r" type="button"
                            class="dropdown-toggle rounded-circle bottom-1 align-items-center border-0"
                            data-bs-toggle="dropdown" aria-expanded="false"
                            style="background-color: {{ $bimer->color_texto }}; color: {{ $bimer->color_fondo }}; width: 64px; height: 64px;">
                            <span class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%;">
                                <i class="bi bi-people-fill fs-2"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark bg-black">
                            <li><a target="_blank" id="facebook" class="dropdown-item d-flex justify-content-between"
                                    href="{{ $bimer->rede->facebook }}"><i class="bi bi-facebook"></i>Facebook</a></li>
                            <li><a target="_blank" id="instagram" class="dropdown-item d-flex justify-content-between"
                                    href="{{ $bimer->rede->instagram }}"><i class="bi bi-instagram"></i>Instagram</a>
                            </li>
                            <li><a target="_blank" id="tiktok" class="dropdown-item d-flex justify-content-between"
                                    href="{{ $bimer->rede->tiktok }}"><i class="bi bi-tiktok"></i>TikTok</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="d-flex justify-content-evenly align-items-center px-5"
                    style="color: {{ $bimer->color_texto }};background-color: {{ $bimer->color_fondo }}">
                    <div class="col-md-6">
                        <a target="_blank" id="whatsapp" class="btn d-flex flex-column w-100"
                            style="color: {{ $bimer->color_texto }};background-color: {{ $bimer->color_fondo }}"
                            href="https://api.whatsapp.com/send?phone={{ $bimer->rede->whatsapp }}" role="button">
                            <i class="bi bi-whatsapp mb-2"></i>
                            <p>Whatsapp</p>
                        </a>
                    </div>

                    <div class="col-md-6">
                        <button id="compartir" class="btn d-flex flex-column align-items-center w-100"
                            style="color: {{ $bimer->color_texto }};background-color: {{ $bimer->color_fondo }}">
                            <i class="bi bi-share-fill mb-2"></i>
                            <p>Compartir</p>
                        </button>
                    </div>
                </div>
            </div>

            <script>
                // JavaScript
                const shareButton = document.getElementById('compartir');

                shareButton.addEventListener('click', async () => {
                    // Verificar si la API está disponible en el navegador
                    console.log('entro');
                    var currentUrl = window.location.href;
                    if (navigator.share) {
                        try {
                            // Llamar a la función share() con los datos que deseas compartir
                            await navigator.share({
                                title: 'Vcard Mine',
                                text: 'Te comparto mi BIMER:',
                                url: currentUrl, // URL del contenido compartido
                            });
                            console.log('Contenido compartido exitosamente');
                        } catch (error) {
                            console.error('Error al compartir:', error);
                        }
                    } else {
                        console.error('La Web Share API no está disponible en este navegador');
                    }
                });
            </script>
        </div>


    </div>
</body>
