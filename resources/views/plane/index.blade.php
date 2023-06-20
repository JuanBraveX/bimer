@extends('layouts.app')

@section('template_title')
    Plane
@endsection

@section('content')
    <div class="container-xxl">
        <div class="container-xxl container--btns d-flex align-items-center px-5">
            <a href="{{ asset('bimers') }}" class="btn btn-outline-success btn--add border-0 text-uppercase" type="button">
                Ver tus Bimer
            </a>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
        @php $i=0; @endphp

        <div class="card-body d-flex justify-content-center px-5">
            <div class="row justify-content-center">
                @foreach ($planes as $plane)
                    @php
                        $i++;
                        $parts = explode('@', Auth::user()->email);
                        $domain = end($parts);
                        $domainParts = explode('.', $domain);
                        $emailProvider = reset($domainParts);
                    @endphp
                    <div class="col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch justify-content-center mb-3">
                        <div class="card card-plans card-plans--beginner text-light">

                            <div class="card-body d-flex flex-column align-items-center text-center">
                                <h5 class="card-title fs-2 fw-semibold">{{ $plane->nombre }}</h5>
                                <p class="card-text fs-5 d-none">{{ $plane->descripcion }}</p>
                                <p class="card-text card-price pt-1 mb-0">${{ $plane->precio }}</p>
                                <p class="card-text fs-5 d-none">Descuento: {{ number_format($plane->descuento * 100, 0) }}%
                                </p>
                            </div>
                            <div class="card-footer border-top-0 bg-transparent">
                                <form class="d-flex flex-column justify-content-center"
                                    @if ($emailProvider === env('EMAIL_ACCESS_FREE')) action="{{ route('suscripciones.store') }}" @endif
                                    @if ($plane->nombre !== 'Begginer') action="{{ route('planes.enlacePago') }}" @endif
                                    @if ($plane->nombre === 'Begginer') action="{{ route('suscripciones.store') }}" @endif
                                    role="form" enctype="multipart/form-data" method="POST">
                                    <input type="hidden" name="suspendida" value="0">
                                    <input type="hidden" name="inicio_en" value="{{ now()->toDateString() }}">
                                    <input type="hidden" name="finaliza_en"
                                        value="{{ now()->addYear()->toDateString() }}">
                                    <input type="hidden" name="id_cliente" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="cantidad" value="1">
                                    <input type="hidden" name="id_plan" value="{{ $plane->id }}">
                                    <input type="hidden" name="precio_real" value="{{ $plane->precio }}">
                                    @if ($plane->nombre !== 'Begginer')
                                        <label for="cantidad text-light">Cantidad:</label>
                                        <input type="number" class="form-control" id="cantidad{{ $i }}"
                                            name="cantidad" min="1" max="100" step="1" value="1">
                                    @else
                                        <input type="hidden" class="form-control form-select--field" readonly
                                            id="cantidad{{ $i }}" name="cantidad" value="1">
                                    @endif
                                    <input type="hidden" class="form-control" readonly id="id{{ $i }}"
                                        name="id_plan" value="{{ $plane->id }}">
                                    <input type="hidden" class="form-control" readonly id="descuento{{ $i }}"
                                        value="{{ $plane->descuento }}">
                                    <input type="hidden" class="form-control" readonly id="precio{{ $i }}"
                                        value="{{ $plane->precio }}">
                                    <label for="cantidad text-light">Precio:</label>
                                    <input type="number" class="form-control form-select--field" readonly
                                        id="total{{ $i }}" name="precio_real">
                                    <button type="submit" class="btn--acquire text-center fw-medium mx-auto mt-2">
                                        {{ __('Adquirir') }}</button>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        // Obtener los elementos de cantidad, precio, descuento y total
                        var cantidadInput{{ $i }} = document.getElementById('cantidad{{ $i }}');
                        var descuentoInput{{ $i }} = document.getElementById('descuento{{ $i }}');
                        var precioInput{{ $i }} = document.getElementById('precio{{ $i }}');
                        var totalInput{{ $i }} = document.getElementById('total{{ $i }}');

                        // Funci贸n para calcular el total y actualizar el campo oculto
                        function calcularTotal{{ $i }}() {
                            var cantidad = cantidadInput{{ $i }}.value;
                            var precio = precioInput{{ $i }}.value;
                            var descuento = descuentoInput{{ $i }}.value;
                            if (cantidad >= 2) {
                                var total = (cantidad * precio) - (cantidad * precio * descuento);
                            } else {
                                var total = (cantidad * precio);
                            }


                            totalInput{{ $i }}.value = total;
                        }

                        // Asignar el evento input a los campos de entrada
                        cantidadInput{{ $i }}.addEventListener('input', calcularTotal{{ $i }});
                        descuentoInput{{ $i }}.addEventListener('input', calcularTotal{{ $i }});
                        precioInput{{ $i }}.addEventListener('input', calcularTotal{{ $i }});

                        // Calcular el total inicialmente al cargar la p谩gina
                        calcularTotal{{ $i }}();
                    </script>
                @endforeach
            </div>
        </div>
    </div>
@endsection
