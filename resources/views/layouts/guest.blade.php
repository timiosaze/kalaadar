<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{asset('stylesheet.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://js.stripe.com/v3/"></script>
        <script src="{{asset('scripts/checkout.js')}}"></script>
        
        <script>
            var count = 0;

            window.addEventListener('refresh-page', event => {
                window.location.reload(false); 
            });
            $(document).ready(function () {
	            $('#addLocation').click(function () {
                    count++;
                    var myDiv = document.getElementById("locationId");
                    var id = "locationId"+count.toString();
                    var divClone = myDiv.cloneNode(true); 
                    

                    document.getElementById("parentLocation").appendChild(divClone);
                    var len = $("div[x-data='customselect']").length;
                    console.log(len);
                    if(len > 1){
                        $("#remove").show();
                    } else {
                        $("#remove").hide();
                    }
    
                })
            });
            function popup() {
                console.log("true");
                $('[id*="defaultModal"]').show();
            }
            function remove()
            {
                $('#parentLocation #locationId').last().remove();
                var len = $("div[x-data='customselect']").length;
                console.log(len);
                if(len > 1){
                    $("#remove").show();
                } else {
                    $("#remove").hide();
                }
            }
        </script>
       
       <wireui:scripts />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body>
        <x-dialog />
        <x-notifications />
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts

        @stack('scripts')
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        <script src="https://unpkg.com/flowbite@1.5.3/dist/datepicker.js"></script>
        <script src="{{asset('scripts/jquery-3.6.1.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="{{asset('scripts/script.js')}}"></script>
    </body>
</html>
