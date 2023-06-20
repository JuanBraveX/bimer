@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <section class="p-5 mb-5" style="margin: 4.5rem auto;">
                <div class=" p-5 my-5 text-center justify-content-between">
                    <form class="login text-center my-5 bg-black" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3 class="h03">Iniciar Sesion</h3><br>
                        <div class="form-floating mb-2">
                            <input type="email" class="form-control rounded-1 @error('email') is-invalid @enderror"
                                id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}" name="email"
                                required autocomplete="email" autofocus>
                            <label for="floatingInput">Email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" class="form-control rounded-1 @error('password') is-invalid @enderror"
                                id="floatingInput" name="password" required autocomplete="current-password"
                                placeholder="name@example.com">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="floatingInput">Contraseña</label>
                        </div>
                        <div class="container1">
                            <label class="switch">
                                <label class="h04 m-2">Recordarme</label>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn12 text-center">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="my-2">
                            <a href="register">
                                <button class="btn13 text-center" type="button" value="registros">Crear Cuenta</button></a>
                        </div>

                        <div class="col-12 my-3">
                            @if (Route::has('password.request'))
                                <a class="a1 st-long" href="{{ route('password.request') }}">
                                    {{ __('Olvidaste tu contraseña?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </section><br>
        </div>
    </div>
    <style>
        .form1 {
            position: absolute;
            width: 385px;
            height: 56px;
            top: -0.5px;
            left: -1px;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            border-radius: 4px;
            right: 3px;
            box-sizing: border-box;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        @media (max-width: 400px) {
            .form1 {
                width: 90%;
            }
        }

        /*************************************** */
        .login {
            width: 436px;
            position: absolute;
            border: 1px solid rgb(0, 0, 0);
            border-radius: 15px;
            padding: 14px 0px 0px;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 8px 8px 24px rgba(0.10, 0, 0, 0.25);
        }

        @media (max-width: 400px) {
            .login {
                width: 90%;
            }
        }

        /******************************************************* */
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

        /**estilo del boton login */
        .btn12 {
            background: #C6AA33;
            width: 385px;
            height: 40px;
            padding: 10px 20px;
            border: 2px solid #C6AA33;
            border-radius: 30px;
            justify-content: center;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-weight: normal;
            font-size: 20px;
            line-height: 20px;
            color: #ffffff;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.25);
            text-decoration: none;
        }

        .btn12:hover {
            background-color: #ffffff;
            color: #C6AA33;
            border: 2px solid #ffffff;
        }

        /*estilo para que se haga responsivo el boton*/
        @media (max-width: 400px) {
            .btn12 {
                width: 90%;
            }
        }

        .btn13 {
            background: #ffffff;
            width: 385px;
            height: 40px;
            padding: 10px 20px;
            border: 2px solid #ffffff;
            border-radius: 30px;
            justify-content: center;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-weight: normal;
            font-size: 20px;
            line-height: 20px;
            color: #C6AA33;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.25);
            text-decoration: none;
        }

        .btn13:hover {
            background-color: #C6AA33;
            color: #ffffff;
            border: 2px solid #C6AA33;
        }

        /*estilo para que se haga responsivo el boton*/
        @media (max-width: 400px) {
            .btn13 {
                width: 90%;
            }
        }

        .label1 {
            width: 129px;
            height: 25px;
            font: 'Poppins', Poppins;
            font-style: normal;
            font-weight: 500;
            font-size: 12px;
            line-height: 16px;
            /* or 133% */
            align-items: center;
            text-transform: uppercase;

            color: #000000;
        }

        @media (max-width: 400px) {
            .label1 {
                width: 90%;
            }
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

        /***********************efecto hover inputs del login**********************************/
        .input-bx {
            display: flex;
            position: relative;
            width: 385px;
            height: 56px;
            align-items: center;
            justify-content: center;
            left: 27px;

        }

        .input-bx input {
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

        .input-bx span {
            position: absolute;
            font-family: 'Poppins', sans-serif;
            left: 0;
            padding: 10px;
            font-size: 1rem;
            color: #ffffff;
            pointer-events: none;
            transition: 0.6s;
        }

        .input-bx input:valid~span,
        .input-bx input:focus~span {
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            transform: translateX(10px) translateY(-28px);
            font-size: 12px;
            line-height: 16px;
            font-weight: 400;
            padding: 0 10px;
            background: #000000;

        }

        .input-bx input:valid,
        .input-bx input:focus {
            color: #0b0a09;
            border: 2px solid #C6AA33;
        }

        @media (max-width: 400px) {
            .input-bx {
                width: 90%;
            }
        }

        .h04 {
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 24px;
            padding: 4px;
            color: #fff;
        }

        @media (max-width: 400px) {
            .h04 {
                width: 90%;
            }
        }

        /*estiloc para el check switch de las seccion login*/
        .container1 {
            display: flex;
            justify-content: end;
            width: 97%;
        }

        .container1 h1 {
            padding: 2rem 0;
            color: #fff;
            font-size: 1.5rem;
            text-align: center;
            letter-spacing: 1px;
        }

        .container1 .switch {
            height: 80px;
            padding: 0 1.5rem;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .container1 .switch .input {
            display: none;
        }

        .container1 .switch .rail {
            position: relative;
            width: 34px;
            height: 14px;
            background-color: rgba(65, 58, 58, 0.85);
            border-radius: 3rem;
        }

        .container1 .switch .rail .circle {
            display: block;
            width: 20px;
            height: 20px;
            background-image: linear-gradient(to right, #C6AA33 0%, #C6AA33 0%, #C6AA33 0%, #C6AA33 33%, #C6AA33 66%, #C6AA33 100%);
            border-radius: 50%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 0;
            transition: transform 0.4s;
        }

        .container1 .switch .indicator {
            width: 15px;
            height: 15px;
            background-color: #020202;
            border-radius: 50%;
            margin-left: -0.9rem;
            transition: 0.4s;
        }

        .container1 .switch .input:checked~.rail .circle {
            transform: translate(18px, -52%);
        }

        .container1 .switch .input:checked~.indicator {
            background-color: #0af90a;
            display: none;
        }

        input::placeholder {
            color: #fff;
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

        .form-floating {
            width: 85% !important;
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
    </style>
    <!-- Enlazar archivos JS de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <!-- Enlazar archivo JS de Bootstrap Floating Labels -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-floating-labels@1.0.2/dist/js/bootstrap-floating-labels.min.js">
    </script>
@endsection
