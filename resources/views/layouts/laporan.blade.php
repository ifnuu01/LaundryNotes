<!DOCTYPE html>
<html lang="id">
<head>
    <title>Struk Laundry</title>
    @vite(['resources/css/app.css']) 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            filter: blur(4px);
        }
        @media print{
            @page {
                size: A4 portrait;
            }
            body {
            filter: none !important;
        }
        }
        </style>
</head>

<body class="font-jakarta bg-white text-black" onload="window.print()">
    <script>
        window.onafterprint = function() {
            window.history.back();
        };
    </script>

    <div class="py-4 text-xs flex flex-col justify-center items-center">
        <div class="flex border border-gray-500 p-4 mx-auto gap-4 justify-between items-center w-full">
            <div>
                <h1 class="mb-2">LaundryNotes</h1>
                <span>Jl. Kuaro, Gn. Kelua, Kec. Samarinda Ulu, Kota <br> Samarinda, Kalimantan Timur 75119</span>
            </div>
            <div class="flex justify-between items-center">
                <img src="{{ asset('images/darkLogo.svg') }}" alt="Logo" width="40">
                <b class="text-lg font-semibold ml-4">Laundry Notes</b>
            </div>
        </div>

        <h1 class="text-2xl font-bold mt-6">@yield('title')</h1>
        <p class="mt-4">Periode <span>@yield('tanggalStart')</span> - <span>@yield('tanggalEnd')</span></p>
        <div class="w-full mt-4">
            @yield('content')
        </div>
    </div>

</body>
</html>