@extends('layouts.app')

@section('template_title')
    {{ $suscripcione->name ?? 'Suscripción' }}
@endsection

@section('content')
    <section class="content container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #000000;">
                        <div class="float-left">
                            <span class="card-title text-custom">{{ 'Suscripción' }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-sm btn-primary bg-custom border-0" href="{{ route('suscripciones.index') }}">
                                {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body" style="background-color: #000000;">

                        <div class="form-group">
                            <strong class="text-custom">Id Cliente:</strong>
                            <span class="text-white">{{ $suscripcione->id_cliente }}</span>
                        </div>
                        <div class="form-group">
                            <strong class="text-custom">Id Plan:</strong>
                            <span class="text-white">{{ $suscripcione->id_plan }}</span>
                        </div>
                        <div class="form-group">
                            <strong class="text-custom">Inicio:</strong>
                            <span class="text-white">{{ $suscripcione->inicio_en }}</span>
                        </div>
                        <div class="form-group">
                            <strong class="text-custom">Finaliza:</strong>
                            <span class="text-white">{{ $suscripcione->finaliza_en }}</span>
                        </div>
                        <div class="form-group">
                            <strong class="text-custom">Canceló:</strong>
                            <span class="text-white">{{ $suscripcione->cancelo_en }}</span>
                        </div>
                        <div class="form-group">
                            <strong class="text-custom">Renovación:</strong>
                            <span class="text-white">{{ $suscripcione->renovacion }}</span>
                        </div>
                        <div class="form-group">
                            <strong class="text-custom">Renovación Cancelada:</strong>
                            <span class="text-white">{{ $suscripcione->renovacion_cancelada }}</span>
                        </div>
                        <div class="form-group">
                            <strong class="text-custom">Cantidad:</strong>
                            <span class="text-white">{{ $suscripcione->cantidad }}</span>
                        </div>
                        <div class="form-group">
                            <strong class="text-custom">Precio Neto:</strong>
                            <span class="text-white">{{ $suscripcione->precio_neto }}</span>
                        </div>
                        <div class="form-group">
                            <strong class="text-custom">Descuento:</strong>
                            <span class="text-white">{{ $suscripcione->descuento }}</span>
                        </div>
                        <div class="form-group">
                            <strong class="text-custom">Precio Real:</strong>
                            <span class="text-white">{{ $suscripcione->precio_real }}</span>
                        </div>
                        <div class="form-group">
                            <strong class="text-custom">Suspendida:</strong>
                            <span class="text-white">{{ $suscripcione->suspendida }}</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <style>
            .bg-custom {
                background-color: #C6AA33;
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

            .text-custom {
                color: #C6AA33;
            }

            .mt-4 {
                margin-top: 20px;
            }
        </style>
    </section>
@endsection
