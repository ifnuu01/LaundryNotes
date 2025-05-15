<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    @stack('styles')
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-skyBlue font-jakarta">
    <div class="flex min-h-screen">
        <aside class="w-64 p-6 fixed h-full">
            <div class="flex items-center gap-4">
                <img src="{{asset('images/logo.svg')}}" width="60" height="54" alt="">
                <p class="text-lg text-fg font-semibold">LaundryNotes</p>
            </div>
            <nav class="space-y-4 text-fg mt-4">
                <p class="text-fg text-sm mb-2 font-semibold">Dashboard</p>
                <div class="ml-2 flex flex-col gap-y-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-4 cursor-pointer hover:bg-skyBlueDark hover:text-white rounded-md p-2 {{ request()->is('dashboard') ? 'bg-skyBlueDark text-white' : 'text-fg' }}">
                        <iconify-icon icon="material-symbols:dashboard-outline" width="24" height="24"></iconify-icon>
                        <span class="block text-sm font-semibold py-2">Beranda</span>
                    </a>
                    <a href="{{ route('pesanan.index') }}" class="flex items-center gap-4 cursor-pointer hover:bg-skyBlueDark hover:text-white rounded-md p-2 {{ request()->is('dashboard/pesanan*') ? 'bg-skyBlueDark text-white' : 'text-fg' }}">
                        <iconify-icon icon="lets-icons:order" width="24" height="24"></iconify-icon>
                        <span class="block text-sm font-semibold py-2">Pesanan</span>
                    </a>
                    <a href="{{ route('riwayat.index') }}" class="flex items-center gap-4 cursor-pointer hover:bg-skyBlueDark hover:text-white rounded-md p-2 {{ request()->is('dashboard/riwayat*') ? 'bg-skyBlueDark text-white' : 'text-fg' }}">
                        <iconify-icon icon="subway:time-2" width="24" height="24"></iconify-icon>
                        <span class="block text-sm font-semibold py-2">Riwayat Pesanan</span>
                    </a>
                </div>
            @if(Auth::user()->role === 'admin')
                <p class="text-fg text-sm mb-2 font-semibold">Master Data</p>
                <div class="ml-2 flex flex-col gap-y-1">
                    <a href="{{ route('layanan.index') }}" class="flex items-center gap-4 cursor-pointer hover:bg-skyBlueDark hover:text-white rounded-md p-2 {{ request()->is('dashboard/layanan*') ? 'bg-skyBlueDark text-white' : 'text-fg' }}">
                        <iconify-icon icon="material-symbols:local-laundry-service-outline" width="24" height="24"></iconify-icon>
                        <span class="block text-sm font-semibold py-2">Paket Layanan</span>
                    </a>
                    <a href="{{ route('kasir.index') }}" class="flex items-center gap-4 cursor-pointer hover:bg-skyBlueDark hover:text-white rounded-md p-2 {{ request()->is('dashboard/kasir*') ? 'bg-skyBlueDark text-white' : 'text-fg' }}">
                        <iconify-icon icon="gg:profile" width="24" height="24"></iconify-icon>
                        <span class="block text-sm font-semibold py-2">Kasir</span>
                    </a>
                </div>
            
                <p class="text-fg text-sm mb-2 font-semibold">Laporan</p>
                <div class="ml-2 flex flex-col gap-y-1">
                    <a href="{{ route('laporan.pemesanan') }}" class="flex items-center gap-4 cursor-pointer hover:bg-skyBlueDark hover:text-white rounded-md p-2 {{ request()->is('dashboard/laporan/pemesanan*') ? 'bg-skyBlueDark text-white' : 'text-fg' }}">
                        <iconify-icon icon="lets-icons:order" width="24" height="24"></iconify-icon>
                        <span class="block text-sm font-semibold py-2">Jumlah Pemesanan</span>
                    </a>
                    <a href="{{ route('laporan.pendapatan') }}" class="flex items-center gap-4 cursor-pointer hover:bg-skyBlueDark hover:text-white rounded-md p-2 {{ request()->is('dashboard/laporan/pendapatan*') ? 'bg-skyBlueDark text-white' : 'text-fg' }}">
                        <iconify-icon icon="tdesign:money" width="24" height="24"></iconify-icon>
                        <span  class="block text-sm font-semibold py-2">Total Pendapatan</span>
                    </a>
                    <a href="{{ route('laporan.terlaris') }}" class="flex items-center gap-4 cursor-pointer hover:bg-skyBlueDark hover:text-white rounded-md p-2 {{ request()->is('dashboard/laporan/terlaris*') ? 'bg-skyBlueDark text-white' : 'text-fg' }}">
                        <iconify-icon icon="material-symbols:local-laundry-service-outline" width="24" height="24"></iconify-icon>
                        <span class="block text-sm font-semibold py-2">Paket Terlaris</span>
                    </a>
                    <a href="{{ route('laporan.kasir') }}" class="flex items-center gap-4 cursor-pointer hover:bg-skyBlueDark hover:text-white rounded-md p-2 {{ request()->is('dashboard/laporan/kasir*') ? 'bg-skyBlueDark text-white' : 'text-fg' }}">
                        <iconify-icon icon="gg:profile" width="24" height="24"></iconify-icon>
                        <span class="block text-sm font-semibold py-2">Kinerja Kasir</span>
                    </a>

                </div>
            @endif
            </nav>
            
          </aside>

          <main class="flex-1 p-6 ml-64 overflow-hidden">
            <div class="mb-6 flex justify-between items-center fixed top-0 left-[262px] right-2 p-4 z-10">
                <div>
                    <h1 class="text-lg text-fg font-semibold capitalize">Selamat Datang, {{Auth::user()->nama}}</h1>
                    <p class="text-sm text-fg">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                </div>
                <div>
                    <form action="{{route('logout')}}" method="POST" id="logout-form">
                        @csrf
                        <x-button color="bg-danger btn-logout" text="Keluar" type="button" icon="ic:baseline-logout"/>
                    </form>
                </div>
            </div>
            <div class="bg-white p-6 rounded-md shadow-sm mt-16 animate-fade-up">
              @yield('content')
            </div>
          </main>
    </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.btn-delete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                const id = this.dataset.id;
                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            });
        });

        const logoutButton = document.querySelector('.btn-logout');

        logoutButton.addEventListener('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin keluar?',
                text: "Anda akan keluar dari dashboard!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, keluar',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        });
    });
</script>
</body>
</html>