@extends('layouts.app')

@section('template_title')
Suscripcione
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
                 <div>
                <div
                class="container-xxl container--btns d-flex align-items-center justify-content-end flex-wrap-reverse gap-2 px-5">
                <div class="container--search d-flex position-relative">
                    <button class="btn-search position-absolute text-light">
                        <i class="bi bi-search w-75"></i>
                    </button>
                    <input class="form-control form-control--input text-light" type="text"
                        id="filtroTabla" placeholder="Filtrar tabla" aria-label="Search">
                </div>
            </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @elseif ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="container-xxl container-table px-sm-5">
                    <div class="table-responsive table--data">
                        <table class="table tabla-filtrable mb-0" id="tablaSuscripciones">
                            <thead class="thead">
                                <tr>
                                    <th class="d-none d-sm-table-cell">No</th>
                                    <th>Plan</th>
                                    <th>Inicio</th>
                                    <th>Finaliza</th>
                                    <th class="d-none d-sm-table-cell">Renovacion</th>
                                    <th class="d-none d-sm-table-cell">Cantidad</th>
                                    <th class="d-none d-sm-table-cell">Precio</th>
                                    <th class="d-none d-sm-table-cell">Suspendida</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suscripciones as $suscripcione)
                                
                                <tr>
                                    <td class="d-none d-sm-table-cell">{{ ++$i }}</td>

                                    <td>{{ $suscripcione->plane->nombre }}</td>
                                    <td>{{ $suscripcione->inicio_en }}</td>
                                    <td>{{ $suscripcione->finaliza_en }}</td>

                                    <td class="d-none d-sm-table-cell">{{ $suscripcione->renovacion }}</td>

                                    <td class="d-none d-sm-table-cell">{{ $suscripcione->cantidad }}</td>

                                    <td class="d-none d-sm-table-cell">{{ $suscripcione->precio_real }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $suscripcione->suspendida }}</td>

                                    <td>
                                        <a class="btn btn-sm btn-primary bg-custom border-0" href="{{ route('suscripciones.show',$suscripcione->id) }}"><i class="bi bi-eye-fill"></i> {{ __('Mostrar') }}</a>
                                        @csrf
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $suscripciones->links() !!}
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
    </style>
</div>
@endsection