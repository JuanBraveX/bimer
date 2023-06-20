<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>

<body style="background-color: grey; 
    justify-content: center;
    height: 100%;">
    <div
        style="background-color: #ffffff;
            border: 1px solid #ccc; 
            border-radius: 4px; 
            padding: 10px; 
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;">
        <div style="height: 50%;">
            <p style="font-size: 14px;
                height: 75%;
                width: 100%;">
                <strong>Nombre:</strong> {{ $nombre }} {{ $apellidos }}<br>
                <strong>Empresa:</strong> {{ $empresa }}<br>
                <strong>Puesto:</strong> {{ $puesto }}<br>
                <strong>Mensaje:</strong> {{ $mensaje }}<br>
            </p>
        </div>
        <div style="height: 50%;">
            <a href="mailto:{{ $email }}"
                style="background-color: #f44336; /* Red */
                            border: none;
                            color: white;
                            padding: 15px 32px;
                            text-align: center;
                            text-decoration: underline;
                            display: inline-block;
                            font-size: 16px; width: 50%;">
                Abrir Correo
            </a>
            <a class="btn" href="tel:{{ $telefono }}"
                style="background-color: #4CAF50; /* Green */
                            border: none;
                            color: white;
                            padding: 15px 32px;
                            text-align: center;
                            text-decoration: underline;
                            display: inline-block;
                            font-size: 16px; width: 50%;">
                Abrir Teléfono
            </a>
        </div>
    </div>
</body>

</html>
