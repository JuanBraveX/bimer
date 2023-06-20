<!DOCTYPE html>
<html lang="en">
@php
$nombre = $bimer->suscripcione->plane->nombre
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $nombre }}</title>
    <link rel="icon" href="{{ asset('favicon1.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ secure_asset('css/bimers.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

@if( $nombre === 'Begginer')
@include('bimer.bimers.begginer')
@endif
@if( $nombre === 'Ideal')
@include('bimer.bimers.ideal')
@endif
@if( $nombre === 'Mine')
@include('bimer.bimers.mine')
@endif
@if( $nombre === 'One')
@include('bimer.bimers.one')
@endif


</html>