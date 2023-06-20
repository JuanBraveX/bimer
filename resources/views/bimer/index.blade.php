@extends('layouts.app')

@section('template_title')
    Bimer
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
                            <input class="form-control form-control--input text-light border-0" type="text" id="filtroTabla"
                                placeholder="Filtrar tabla" aria-label="Search">
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container-xxl container-table px-sm-5">
                        <div class="table-responsive-sm table--data">
                            <table class="table table-sm tabla-filtrable mb-0" id="tablaSuscripciones">
                                <thead class="thead">
                                    <tr>
                                        <th class="d-none d-sm-table-cell">No</th>

                                        <th>Plan</th>
                                        <th>Nombre</th>
                                        <th class="d-none d-sm-table-cell">Apellido</th>
                                        <th class="d-none d-sm-table-cell">Empresa</th>
                                        <th class="d-none d-sm-table-cell">Telefono</th>
                                        <th class="d-none d-sm-table-cell">Puesto</th>
                                        <th class="d-none d-sm-table-cell">Correo</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bimers as $bimer)
                                        <tr>
                                            <td class="d-none d-sm-table-cell">{{ ++$i }}</td>

                                            <td>{{ $bimer->suscripcione->plane->nombre }}</td>
                                            <td>{{ $bimer->nombre }}</td>
                                            <td class="d-none d-sm-table-cell">{{ $bimer->apellido }}</td>
                                            <td class="d-none d-sm-table-cell">{{ $bimer->empresa }}</td>
                                            <td class="d-none d-sm-table-cell">{{ $bimer->telefono }}</td>
                                            <td class="d-none d-sm-table-cell">{{ $bimer->puesto }}</td>
                                            <td class="d-none d-sm-table-cell">{{ $bimer->correo }}</td>
                                            <td>
                                                <a class="btn btn-success bg-custom border-0"
                                                    href="{{ route('bimers.edit', $bimer->id) }}"><i
                                                        class="bi bi-pencil-square"></i> {{ __('Editar') }}</a>
                                                @csrf
                                            </td>
                                            <td>
                                                <a class="btn btn-primary bg-custom border-0"
                                                    href="{{ route('bimers.show', $bimer->id) }}" target="_blank"><i
                                                        class="bi bi-eye-fill"></i> {{ __('Ver') }}</a>
                                                @csrf
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $bimers->links() !!}
            </div>
        </div>
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
    </div>
@endsection
