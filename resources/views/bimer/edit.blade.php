@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Bimer
@endsection

@section('content')
    <section class="content container-fluid h-100">
            <div class="col-md-12 h-100">

                @includeif('partials.errors')

                <div class="container-xxl shadow my-5 rounded h-100">
                    <div class="card-header align-items-center justify-content-center d-flex my-3 rounded-1">
                        <span class="card-title text-white fs-2 fw-bold">{{ __('Personalizar') }} tu Bimer</span>
                        
                    </div>
                    <div class="card-body h-100">
                        

                            @include('bimer.form')

                        
                    </div>
                </div>
            </div>
    </section>
@endsection
