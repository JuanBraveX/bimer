<script>
    // URL específica desde la cual se debe auto refrescar la página
    const urlEspecifica = '{{ route('bimers.update', $bimer->id) }}';

    // Verificar si la URL de referencia coincide con la URL específica
    if (document.referrer === urlEspecifica) {
        // Refrescar la página después de 2 segundos
        setTimeout(function() {
            location.reload();
        }, 2000);
    }
</script>

<link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<section class="container-card container h-100 d-flex justify-content-around pe-5 flex-wrap">
    <div class='col-md-6 h-100'>
        <div class='dropdown mb-3'>
            <button
                class='btn dropdown-toggle dropdown-toggle--edit d-flex justify-content-between align-items-center position-relative'
                type='button' id='dropdownFormButton' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Personalizar</button>
            <div class='dropdown-menu dropdown-menu--edit p-3 position-relative flex-column'
                aria-labelledby='dropdownFormButton'>
                <form class="w-100" method="POST" action="{{ route('bimers.update', $bimer->id) }}" role="form"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-1" id="floatingInput"
                            placeholder="name@example.com" value="{{ $bimer->empresa }}" name="empresa">
                        <label for="floatingInput">Nombre de la empresa</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-1" id="floatingInput"
                            placeholder="name@example.com" value="{{ $bimer->nombre }}" name="nombre">
                        <label for="floatingInput">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-1" id="floatingInput"
                            placeholder="name@example.com" value="{{ $bimer->apellido }}" name="apellido">
                        <label for="floatingInput">Apellido</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-1" id="floatingInput"
                            placeholder="name@example.com" value="{{ $bimer->puesto }}" name="puesto">
                        <label for="floatingInput">Puesto</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-1" id="floatingInput"
                            placeholder="name@example.com" value="{{ $bimer->correo }}" name="correo">
                        <label for="floatingInput">Correo electronico</label>
                    </div>
                    @if ($bimer->suscripcione->plane->nombre !== 'Begginer')
                        @if ($bimer->suscripcione->plane->nombre !== 'Mine')
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-1" id="floatingInput"
                                    placeholder="name@example.com" value="{{ $bimer->ubicacion_mapa }}"
                                    name="ubicacion_mapa">
                                <label for="floatingInput">Link de google maps</label>
                            </div>
                        @endif
                    @endif
                    @if ($bimer->suscripcione->plane->nombre === 'Mine')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-1" id="floatingInput"
                                placeholder="name@example.com" value="{{ $bimer->ubicacion_text }}"
                                name="ubicacion_text">
                            <label for="floatingInput">Tu direccion escrita</label>
                        </div>
                    @endif

                    <div class="form-floating mb-3">
                        <input type='tel' id="telefono" class='form-control rounded-1' id="floatingInput"
                            autocomplete="off" placeholder='Telefono' value="{{ $bimer->telefono }}" name="telefono">
                        <label for="floatingInput">Telefono</label>
                    </div>

                    <div class="custom-file text-center mt-3">
                        <input type="file" id="foto_perfil" class="visually-hidden" name="foto_perfil">
                        <label for="foto_perfil" class="border-0 fw-medium btn--add fs-6">Subir Foto</label>
                    </div>
                    @if ($bimer->suscripcione->plane->nombre !== 'Begginer')
                        @if ($bimer->suscripcione->plane->nombre !== 'Ideal')
                            <div class="custom-file text-center mt-3">
                                <input type="file" id="banner" class="visually-hidden" name="banner">
                                <label for="banner" class="border-0 fw-medium btn--add fs-6">Subir Banner</label>
                            </div>
                        @endif
                    @endif
                    <div class="text-center mt-3 px-5">
                        <button class="btn btn-outline-success btn-save" type="submit">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
        <div class='dropdown mb-3'>
            <button
                class='btn dropdown-toggle dropdown-toggle--edit d-flex justify-content-between align-items-center position-relative'
                type='button' id='dropdownFormButton' data-bs-toggle='dropdown' aria-haspopup='true'
                aria-expanded='false'>
                Código QR</button>
            <div class='dropdown-menu dropdown-menu--edit p-3 position-relative flex-column'
                aria-labelledby='dropdownFormButton'>
                <form class="w-100" method="POST" action="{{ route('bimers.update', $bimer->id) }}"
                    role="form" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-floating w-100 mb-3">
                        <input class="form-control rounded-1" id="floatingInput" placeholder="name@example.com"
                            type="text" value="{{ $bimer->fichero->qr }}" name="qr">
                        <label for="floatingInput">Link</label>
                    </div>
                    <div class="text-center mt-3 px-5">
                        <button class="btn btn-outline-success btn-save" type="submit">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
        <div class='dropdown mb-3'>
            <button
                class='btn dropdown-toggle dropdown-toggle--edit d-flex justify-content-between align-items-center position-relative'
                type='button' id='dropdownFormButton' data-bs-toggle='dropdown' aria-haspopup='true'
                aria-expanded='false'>
                Redes</button>
            <div class='dropdown-menu dropdown-menu--edit p-3 position-relative' aria-labelledby='dropdownFormButton'>
                <form class="w-100"method="POST" action="{{ route('bimers.update', $bimer->id) }}" role="form"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-1" id="floatingInput"
                            placeholder="name@example.com" value="{{ $bimer->rede->facebook }}" name="facebook">
                        <label for="floatingInput">Enlace de Facebook</label>
                    </div>
                    @if ($bimer->suscripcione->plane->nombre !== 'Begginer')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-1" id="floatingInput"
                                placeholder="name@example.com" value="{{ $bimer->rede->instagram }}"
                                name="instagram">
                            <label for="floatingInput">Enlace de Instagram</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-1" id="floatingInput"
                                placeholder="name@example.com" value="{{ $bimer->rede->tiktok }}" name="tiktok">
                            <label for="floatingInput">Enlace de TikTok</label>
                        </div>
                        @if ($bimer->suscripcione->plane->nombre !== 'Ideal')
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-1" id="floatingInput"
                                    name="youtube" placeholder="name@example.com"
                                    value="{{ $bimer->rede->youtube }}">
                                <label for="floatingInput">Enlace de YouTube</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-1" id="floatingInput"
                                    name="linkedin" placeholder="name@example.com"
                                    value="{{ $bimer->rede->linkedin }}">
                                <label for="floatingInput">Enlace de Linkedin</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-1" id="floatingInput"
                                    name="indeed" placeholder="name@example.com"
                                    value="{{ $bimer->rede->indeed }}">
                                <label for="floatingInput">Enlace de indeed</label>
                            </div>
                            @if ($bimer->suscripcione->plane->nombre !== 'Mine')
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-1" id="floatingInput"
                                        name="twiter" placeholder="name@example.com"
                                        value="{{ $bimer->rede->twitter }}">
                                    <label for="floatingInput">Enlace de Twitter</label>
                                </div>
                            @endif
                        @endif
                    @endif

                    <div class="form-floating mb-3">
                        <input type='tel' class="form-control rounded-1" id="floatingInput" name="whatsapp"
                            placeholder="name@example.com" value="{{ $bimer->rede->whatsapp }}">
                        <label for="floatingInput">Numero de WhatsApp</label>
                    </div>

                    <div class="text-center mt-3 px-5">
                        <button class="btn btn-outline-success btn-save" type="submit">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
        @if ($bimer->suscripcione->plane->nombre !== 'Begginer')
            <div class='dropdown mb-3'>
                <button
                    class='btn dropdown-toggle dropdown-toggle--edit d-flex justify-content-between align-items-center position-relative'
                    type='button' id='dropdownFormButton' data-bs-toggle='dropdown' aria-haspopup='true'
                    aria-expanded='false'>
                    Colores</button>
                <div class='dropdown-menu dropdown-menu--edit p-3 flex-column position-relative'
                    aria-labelledby='dropdownFormButton'>
                    <form class="w-100" method="POST" action="{{ route('bimers.update', $bimer->id) }}"
                        role="form" enctype="multipart/form-data">
                        @method('PUT')

                        @csrf
                        @if ($bimer->suscripcione->plane->nombre === 'One')
                            <div class="d-flex gap-2 mb-3">
                                <label for="exampleColorInput"
                                    class="form-label col-5 d-flex align-items-center text-white">Selecciona el
                                    color del texto</label>
                                <input type="color"
                                    class="form-control form-control-color col d-flex align-items-center"
                                    name="color_texto" id="exampleColorInputc1" value="{{ $bimer->color_texto }}"
                                    title="Choose your color">
                            </div>
                            <div class="d-flex gap-2 mb-3">
                                <label for="exampleColorInput"
                                    class="form-label col-5 d-flex align-items-center text-white">Elige
                                    el
                                    fondo</label>
                                <input type="color"
                                    class="form-control form-control-color col d-flex align-items-center"
                                    name="color_fondo" id="exampleColorInput" value="{{ $bimer->color_fondo }}"
                                    title="Choose your color">
                            </div>
                        @endif
                        @if ($bimer->suscripcione->plane->nombre !== 'Begginer')
                            @if ($bimer->suscripcione->plane->nombre !== 'One')
                                <div class="d-flex gap-2 mb-3">
                                    <label class="form-label col-5 text-white d-flex align-items-center">Selecciona el
                                        color del texto</label>
                                    <div class="w-100">
                                        <select class="form-select" aria-label="Default select example"
                                            id="select2" name="color_texto">

                                            <option class="bg-black text-white" value="#000000">Negro</option>
                                            <option class="bg-white text-black" value="#ffffff">Blanco</option>
                                            @if ($bimer->suscripcione->plane->nombre === 'Mine')
                                                <option class="text-black" style="background: #94B7BB;"
                                                    value="#94B7BB">
                                                    Azul
                                                    polvo</option>
                                                <option class="text-black" style="background: #F0E991;"
                                                    value="#F0E991">
                                                    Amarillo pastel
                                                </option>
                                                <option class="text-white" style="background: #205C40;"
                                                    value="#205C40">
                                                    Verde
                                                    azulado
                                                </option>
                                                <option class="text-white" style="background: #800000;"
                                                    value="#800000">
                                                    Escarlata
                                                </option>
                                                <option class="text-white" style="background: #800080 ;"
                                                    value="#800080 ">
                                                    Purpura
                                                </option>
                                                <option class="text-white" style="background: #6a6a6a ;"
                                                    value="#6a6a6a ">
                                                    Gris
                                                </option>
                                            @endif
                                        </select>
                                        <i class="bi bi-caret-down-fill"></i>
                                        @if ($bimer->suscripcione->plane->nombre === 'Ideal')
                                            <input type="hidden" name="color_fondo" id="color_fondo"
                                                value="#ffffff">

                                            <script>
                                                document.getElementById('select2').addEventListener('change', function() {
                                                    var selectedColor = this.value;
                                                    if (selectedColor === '#000000') {
                                                        document.getElementById('color_fondo').value = '#ffffff';
                                                    } else {
                                                        document.getElementById('color_fondo').value = '#000000';
                                                    }
                                                });
                                            </script>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endif
                        @if ($bimer->suscripcione->plane->nombre !== 'Begginer')
                            @if ($bimer->suscripcione->plane->nombre !== 'One')
                                @if ($bimer->suscripcione->plane->nombre === 'Mine')
                                    <div class="d-flex gap-2 mb-3">
                                        <label class="form-label col-5 d-flex align-items-center text-white">Elige el
                                            fondo</label>
                                        <div class="w-100">
                                            <select class="form-select" aria-label="Default select example"
                                                id="select1" name="color_fondo">
                                                <option selected class="bg-black text-white" value="#000000">Negro
                                                </option>
                                                <option class="bg-white text-black" value="#ffffff">Blanco</option>

                                                <option class="text-black"style="background: #94B7BB;"
                                                    value="#94B7BB">
                                                    Azul
                                                    polvo</option>
                                                <option class="text-black"style="background: #F0E991;"
                                                    value="#F0E991">
                                                    Amarillo pastel
                                                </option>
                                                <option class="text-white"style="background: #205C40;"
                                                    value="#205C40">
                                                    Verde
                                                    azulado
                                                </option>
                                                <option class="text-white" style="background: #800000;"
                                                    value="#800000">
                                                    Escarlata
                                                </option>
                                                <option class="text-white" style="background: #800080 ;"
                                                    value="#800080 ">
                                                    Purpura
                                                </option>
                                                <option class="text-white" style="background: #6a6a6a ;"
                                                    value="#6a6a6a ">
                                                    Gris
                                                </option>

                                            </select>
                                            <i class="bi bi-caret-down-fill"></i>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endif
                        <div class="text-center mt-3 px-5">
                            <button type="submit" class="btn btn-outline-success btn-save">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
        @if ($bimer->suscripcione->plane->nombre !== 'Begginer')
            @if ($bimer->suscripcione->plane->nombre !== 'Ideal')
                @if ($bimer->suscripcione->plane->nombre !== 'Mine')
                    <div class='dropdown mb-3'>
                        <button
                            class='btn dropdown-toggle dropdown-toggle--edit d-flex justify-content-between align-items-center position-relative'
                            type='button' id='dropdownFormButton' data-bs-toggle='dropdown' aria-haspopup='true'
                            aria-expanded='false'>
                            Carrusel</button>
                        <div class='dropdown-menu dropdown-menu--edit p-3 flex-column position-relative'
                            aria-labelledby='dropdownFormButton'>
                            <form class="w-100"method="POST" action="{{ route('bimers.update', $bimer->id) }}"
                                role="form" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-floating w-100 mb-3">
                                    <input class="form-control rounded-1" id="floatingInput"
                                        placeholder="name@example.com" name="video_link"
                                        @if ($bimer->fichero->video_link !== '') value="{{ $bimer->fichero->video_link }}" @endif
                                        @if ($bimer->fichero->video_link === '') value="vacio" @endif
                                        @if ($bimer->fichero->video_link === 'vacio') value="vacio" @endif>
                                    <label for="floatingInput">Link de YouTube video(opcional)</label>
                                </div>
                                <div class="d-flex flex-column gap-1 my-2 ">
                                    <div class="text-center mt-3">
                                        <input type="file" id="pdf" class="visually-hidden" name="pdf"
                                            accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                        <label for="pdf" class="border-0 fw-medium btns-carrusel">PDF</label>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2 container-photos justify-content-center">
                                    <div class="container-photo text-center mt-3">
                                        <input type="file" accept="image/*" id="foto1"
                                            class="visually-hidden" name="foto_1">
                                        <label for="foto1" class="border-0 fw-medium btns-carrusel">Foto 1</label>
                                    </div>
                                    <div class="container-photo text-center mt-3">
                                        <input type="file" accept="image/*" id="foto2"
                                            class="visually-hidden" name="foto_2">
                                        <label for="foto2" class="border-0 fw-medium btns-carrusel">Foto 2</label>
                                    </div>
                                    <div class="container-photo text-center mt-3">
                                        <input type="file" accept="image/*" id="foto3"
                                            class="visually-hidden" name="foto_3">
                                        <label for="foto3" class="border-0 fw-medium btns-carrusel">Foto 3</label>
                                    </div>
                                    <div class="container-photo text-center mt-3">
                                        <input type="file" accept="image/*" id="foto4"
                                            class="visually-hidden" name="foto_4">
                                        <label for="foto4" class="border-0 fw-medium btns-carrusel">Foto 4</label>
                                    </div>
                                    <div class="container-photo text-center mt-3">
                                        <input type="file" accept="image/*" id="foto5"
                                            class="visually-hidden" name="foto_5">
                                        <label for="foto5" class="border-0 fw-medium btns-carrusel">Foto 5</label>
                                    </div>
                                </div>
                                <div class="text-center mt-3 px-5">
                                    <button class="btn btn-outline-success btn-save" type="submit">Guardar
                                        Cambios</button>
                                </div>

                            </form>

                        </div>

                    </div>
                @endif
            @endif
        @endif
        <div class="text-center mt-3 px-5 ">
            <a class="btn btn-primary bg-custom border-0 d-sm-none" href="{{ route('bimers.show', $bimer->id) }}"
                target="_blank"><i class="bi bi-eye-fill"></i> {{ __('Ver') }}</a>
        </div>
    </div>
    <div class='col-md-6 my-2 d-none d-md-block'>
        <iframe class="v-card col-md-9" style="min-height: 130vh;"
            src="{{ route('bimers.show', $bimer->id) }}"></iframe>
    </div>
</section>
<style>
    .bg-custom {
        background-color: #C6AA33;
        /* Otros estilos personalizados que desees aplicar */
    }

    .btn.btn-success:hover,
    .btn.btn-primary:hover {
        background-color: #fff;
        color: #C6AA33;
    }

    .btn.btn-success:hover i,
    .btn.btn-primary:hover i {
        color: #C6AA33;
    }
</style>
