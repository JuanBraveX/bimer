@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <section class="container text-center my-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="registro text-center bg-black h-100" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <h3 class="h03">Recuperar</h3><br>
                        <div class="form-floating mb-3">
                            <input id="email" type="email"
                                class="form-control rounded-1 @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus id="floatingInput">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn3 col-md-8 mb-2 text-center">
                                {{ __('Enviar Link de recuperacion') }}
                            </button>
                            <div class="col-12 my-3">
                                <label class="label1 mb-0">¿YA ERES MIEMBRO? </label>
                                <a class="a1 st-long" href="{{ route('login') }}"> INICIA SESION</a>
                            </div><br>
                        </div>
                    </form>
                </section>
                
            </div>
        </div>
    </div>
    <style>
        .form2 {
            position: absolute;
            width: 340px;
            height: 56px;
            top: -0.5px;
            left: -1px;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #C6AA33;
            outline: none;
            border-radius: 4px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        @media (max-width: 400px) {
            .form2 {
                width: 80%;
            }
        }

        .registro {
            margin-top: 10%;
            position: relative;
            width: 733px;
            height: 611px;
            padding: 14px 0px 0px;
            left: 50%;
            border-radius: 15px;
            background: 1px solid #FFFFFF;
            transform: translate(-50%, -10%);
            box-shadow: 4px 0px 7px rgba(0, 0, 0, 0.25), 0px 4px 7px rgba(0, 0, 0, 0.25);
        }

        .h03 {
            font-family: 'Poppins', sans-serif;
            font: 100;
            font-style: normal;
            font-weight: 700;
            font-size: 24px;
            line-height: 36px;

            color: #C6AA33;
            text-align: center;
            align-items: center;
        }

        @media (max-width: 4000px) {
            .registro {
                width: 70%;
            }
        }

        .tel1 {
            padding: 0.375rem 0.75rem;

            font-family: 'Poppins bold', sans-serif;
            font-size: 1rem;
            gap: 10px;
            width: 209px;
            height: 56px;
            outline: none;
            left: 50%;
            line-height: 1.5;
            border: 1.5px solid #C6AA33;
            border-radius: 4px;

        }
    
        .btn3 {
            background: #C6AA33;
            
            height: 45px;
            top: 481px;
            left: 275px;
            padding: 10px 20px;
            border: 2px solid #C6AA33;
            border-radius: 20px;
            gap: 10px;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-family: 'Poppins'Poppins;
            font-style: normal;
            font-weight: 500;
            font-size: 20px;
            line-height: 20px;
            color: #fff;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.25);
        }
        
        .label1 {
            width: 129px;
            height: 25px;
            font: 'Poppins', Poppins;
            font-style: normal;
            font-size: 12px;
            /* or 133% */
            align-items: center;
            text-transform: uppercase;
            color: #ffffff;
        }

        .img1 {
            position: absolute;
            width: 387px;
            height: 81px;

        }

        .a1 {
            margin: 1px;
            width: 94px;
            font: 'Poppins', Poppins;
            font-style: normal;
            font-size: 12px;
            /* or 133% */
            align-items: center;
            text-decoration: none;
            color: #0EA3C9;
        }

        .btn3:hover {
            background-color: #fff;
            color: #C6AA33;
            border: 2px solid #fff;
        }

        .input-bx2 {
            display: flex;
            position: relative;
            width: 338px;
            height: 56px;
            outline: none;
            align-items: center;
            justify-content: center;
            left: 195px;
        }

        .input-bx2 input {
            width: 100%;
            padding: 10px;
            border: 2px solid #7f8fa6;
            border-radius: 5px;
            outline: none;
            font-size: 1rem;
            transition: 0.6s;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1.5px solid #C6AA33;
            align-items: center;
            justify-content: center;
        }

        /*Estilos del form  inicio de sesion*/
        .form-control {
            background-color: rgba(0, 0, 0, 0.9) !important;
            color: #fff;
            border: 2px solid var(--bg-second-color);
            height: 56px;
            padding-top: 0.5rem !important;
        }

        .form-control:focus {
            background-color: rgba(0, 0, 0, 0.9);
            color: #fff;
        }

        .form-control:focus {
            box-shadow: none;
            border: 2px solid var(--bg-second-color);
        }

        .form-select {
            background-color: rgba(0, 0, 0, 0.9);
            color: #fff;
            border: 2px solid var(--bg-second-color);
            height: 56px;
            appearance: none;
        }

        .form-floating {
            width: 385px !important;
            margin: 0 auto;
        }

        .form-floating>.form-control:focus~label {
            color: #fff;
            bottom: 15px;
            opacity: 1;
            top: auto;
            width: fit-content !important;
        }

        .form-floating>label {
            color: #fff;
        }

        .form-floating>.form-control:focus~label::after {
            position: absolute;
            inset: 1rem 0.375rem;
            z-index: -1;
            height: 1.5em;
            content: "";
            background-color: rgba(0, 0, 0);
            border-radius: var(--bs-border-radius);
        }

        .form-floating>.form-control:not(:placeholder-shown)~label {
            position: absolute;
            padding: 0 4px;
            bottom: 35px;
            left: 7px;
            color: #fff;
            height: fit-content;
            top: auto;
            background-color: #000;
            opacity: 1;
            width: fit-content !important;
        }

        .form-phone {
            width: 385px;
        }

        .container-area {
            width: 113px;
        }

        .input-area {
            font-size: 12px;
            padding: 0 4px;
            top: 10px;
            left: 8px;
        }

        .container-phone {
            width: 215px !important;
            margin-top: 20px;
        }

        @media (max-width: 300px) {
            .input-bx2 {
                width: 90%;
            }
        }

        @media (max-width: 992px) {

            .form-floating,
            .form-phone {
                width: 80% !important;
            }
        }

        @media (max-width: 768px) {
            .registro {
                width: 100%;
            }
        }

        .border-warning {
            border-color: #C6AA33 !important;
        }

        .border {
            border: 7px solid #f2f2f2 !important;
        }

        input::placeholder {
            color: #fff;
        }
    </style>
@endsection
