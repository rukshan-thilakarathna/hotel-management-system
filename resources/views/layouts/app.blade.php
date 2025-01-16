<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/navbarstyle.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Merienda&family=Roboto:wght@100&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Anaheim&family=Arapey:ital@1&family=Merienda&family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Anaheim&family=Arapey:ital@1&family=Merienda&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
            


        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <style>
        .body{
            font-family: 'Anaheim', sans-serif;
        }
        .main-font {
            font-family:'Merienda', cursive;                  
            }
        .font2{
            font-family: 'Arapey', serif;
        }
        .font3{
            font-family: 'Anaheim', sans-serif;
            color: #8B572A;
        }

        .new-btn-color {
            background-color: #8B572A; /* Default background color */
            border-color: #FFD700;   /* Border color */
            color: white;            /* Text color */
        }

        .new-btn-color:hover {
            background-color: #A67C52; /* Hover background color */
            color: white;
            border-color: #FFD700;               /* Text color on hover */
        }

        .new-btn-color:focus, 
        .new-btn-color:active {
            background-color: #8B572A !important; /* Same background color for focus/active */
            color: white !important;              /* Same text color for focus/active */
            box-shadow: none;                      /* Removes focus outline */
            border-color: #FFD700;                /* Keep border color */
        }

        .custom-color {
            color: #8B572A; /* Set custom color for icons */
        }
        .book-btn-color{
            background-color: white;
            border-color:	#FFD700;
        }
        .book-btn-color:hover{
            background-color: #8B572A;
            color: white;
            border-color: #FFD700; 
        }
        .book-btn-color:focus, 
        .book-btn-color:active {
            background-color: #8B572A !important; /* Same background color for focus/active */
            color: white !important;              /* Same text color for focus/active */
            box-shadow: none;                      /* Removes focus outline */
            border-color: #FFD700;                /* Keep border color */
        }
        @media (max-width: 768px) {
            .abt-img{
                width: 150%;
                justify-content: center;
                margin-left: -93px;
            }
        }

    </style>

    <body class="font-sans antialiased">
        
            @include('layouts.navigation')

            @if (session('success'))
                <script>
                    Swal.fire({
                        title: "Success!",
                        text: "{{ session('success') }}",
                        icon: "success",
                        confirmButtonText: "OK"
                    });
                </script>
            @endif

            @if (session('error'))
                <script>
                    Swal.fire({
                        title: "Error!",
                        text: "{{ session('error') }}",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                </script>
            @endif

            @if (session('warning'))
                <script>
                    Swal.fire({
                        title: "warning!",
                        text: "{{ session('warning') }}",
                        icon: "warning",
                        confirmButtonText: "OK"
                    });
                </script>
            @endif


            {{ $slot }}

            @include('layouts.footer')
           
    </body>

</html>
