<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('images/logo.svg') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="font-jakarta">
    @yield('content')
    @stack('scripts')
@php
    $alerts = [
        'success' => ['icon' => 'success', 'title' => 'Berhasil'],
        'failed' => ['icon' => 'error', 'title' => 'Oops...']
    ];
@endphp

@foreach ($alerts as $type => $config)
    @if ($message = Session::get($type))
        <script>
            Swal.fire({
                icon: "{{ $config['icon'] }}",
                title: "{{ $config['title'] }}",
                text: @json($message),
                confirmButtonColor: '#3085d6'
            });
        </script>
    @endif
@endforeach
</body>
</html>