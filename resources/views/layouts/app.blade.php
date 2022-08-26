<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel and Vue.js Ecommerce</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.7/tailwind.min.css" integrity="sha512-y6ZMKFUQrn+UUEVoqYe8ApScqbjuhjqzTuwUMEGMDuhS2niI8KA3vhH2LenreqJXQS+iIXVTRL2iaNfJbDNA1Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!--<link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css" />-->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="bg-green-500"> 
        <div id="app">
            @yield("content")
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>
    </body>
    <footer class="flex justify-center bg-green-900 text-white mt-20 py-10">
        <div class="container">
            <p class="text-center">
            All right reserved. Developed by <a class="text-blue-300 hover:text-blue-500" target="_blank" href="https://viezfactor.com/">Jonathan Villarreal</a>
            </p>            
        </div>
    </footer>
</html>
