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
</head>
<body class="bg-skyBlue font-jakarta">
    <div class="flex min-h-screen">
        <aside class="w-64 p-6 fixed h-full">
            <div class="flex items-center gap-4">
                <img src="{{asset('images/logo.svg')}}" width="60" height="54" alt="">
                <p class="text-lg text-fg font-semibold">LaundryNotes</p>
            </div>
            <nav class="space-y-4 text-fg mt-10">
                <p class="text-fg text-sm mb-2 font-semibold">Dashboard</p>
                <div class="ml-2">
                    <div class="flex items-center gap-4 hover:bg-skyBlueDark text-fg hover:text-white rounded-md p-2">
                        <iconify-icon icon="material-symbols:dashboard-outline" width="24" height="24"></iconify-icon>
                        <a href="#" class="block text-sm font-semibold py-2">Beranda</a>
                    </div>
                    <div class="flex items-center gap-4 hover:bg-skyBlueDark text-fg hover:text-white rounded-md p-2">
                        <iconify-icon icon="lets-icons:order" width="24" height="24"></iconify-icon>
                        <a href="#" class="block text-sm font-semibold py-2">List Pesanan</a>
                    </div>
                    <div class="flex items-center gap-4 hover:bg-skyBlueDark text-fg hover:text-white rounded-md p-2">
                        <iconify-icon icon="subway:time-2" width="24" height="24"></iconify-icon>
                        <a href="#" class="block text-sm font-semibold py-2">Riwayat Pesanan</a>
                    </div>
                </div>
                <p class="text-fg text-sm mb-2 font-semibold">Master Data</p>
                <div class="ml-2">
                    <div class="flex items-center gap-4 hover:bg-skyBlueDark text-fg hover:text-white rounded-md p-2">
                        <iconify-icon icon="material-symbols:local-laundry-service-outline" width="24" height="24"></iconify-icon>
                        <a href="#" class="block text-sm font-semibold py-2">Paket Layanan</a>
                    </div>
                    <div class="flex items-center gap-4 hover:bg-skyBlueDark text-fg hover:text-white rounded-md p-2">
                        <iconify-icon icon="gg:profile" width="24" height="24"></iconify-icon>
                        <a href="#" class="block text-sm font-semibold py-2">Kasir</a>
                    </div>
                </div>
                <p class="text-fg text-sm mb-2 font-semibold">Laporan</p>
                <div class="ml-2">
                    <div class="flex items-center gap-4 hover:bg-skyBlueDark text-fg hover:text-white rounded-md p-2">
                        <iconify-icon icon="lets-icons:order" width="24" height="24"></iconify-icon>
                        <a href="#" class="block text-sm font-semibold py-2">Jumlah Pemesanan</a>
                    </div>
                    <div class="flex items-center gap-4 hover:bg-skyBlueDark text-fg hover:text-white rounded-md p-2">
                        <iconify-icon icon="tdesign:money" width="24" height="24"></iconify-icon>
                        <a href="#" class="block text-sm font-semibold py-2">Total Pendapatan</a>
                    </div>
                    <div class="flex items-center gap-4 hover:bg-skyBlueDark text-fg hover:text-white rounded-md p-2">
                        <iconify-icon icon="material-symbols:local-laundry-service-outline" width="24" height="24"></iconify-icon>
                        <a href="#" class="block text-sm font-semibold py-2">Paket Terlaris</a>
                    </div>
                    <div class="flex items-center gap-4 hover:bg-skyBlueDark text-fg hover:text-white rounded-md p-2">
                        <iconify-icon icon="gg:profile" width="24" height="24"></iconify-icon>
                        <a href="#" class="block text-sm font-semibold py-2">Kinerja Kasir</a>
                    </div>
                </div>
            </nav>
            <div class="mt-10">
                <x-button width="w-full" text="Keluar" icon="material-symbols:logout"/>
            </div>
          </aside>

          <main class="flex-1 p-6 ml-64">
            <div class="mb-6">
              <h1 class="text-lg text-fg font-semibold">Selamat Datang, Syifai Matcha</h1>
              <p class="text-sm text-fg">Selasa, 18 Maret 2025</p>
            </div>
            <div class="bg-white p-6 rounded-md shadow-sm mt-12">
              @yield('content')
            </div>
          </main>
    </div>
    @stack('scripts')
</body>
</html>