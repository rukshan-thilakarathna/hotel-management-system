<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    </head>
    <style>
       body {
            background-size: cover; /* Ensures the image covers the screen */
            height: 100vh; /* Ensures it covers full height */
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .bg-img{
                min-height: 130vh; /* Prevents cutting on smaller screens */
            
            }
        }

        @media (max-width: 768px) {
            .hide-sm {
                display: none !important;
            }
        }
        </style>
    <body class="bg-img d-flex align-items-center justify-content-center vh-100" style="background: url('{{ asset('images/bg.jpg') }}') no-repeat center center; background-size: cover; ">
            <a href="/" class="position-fixed top-0 end-0 m-4 bg-white rounded-circle p-3 shadow hide-sm">
            <h3><i class="bi bi-house-door-fill text-primary"></i></h3>
        </a>
        {{ $slot }}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
