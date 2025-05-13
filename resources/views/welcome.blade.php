@extends('layouts.app')
@section('title', 'Laundry Notes')
@push('scripts')
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const menuClose = document.getElementById('menu-close');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.remove('translate-x-full');
            overlay.classList.remove('hidden');
        });

        function closeSidebar() {
            sidebar.classList.add('translate-x-full');
            overlay.classList.add('hidden');
        }

        menuClose.addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);
    </script>
@endpush
@section('content')
<div class="bg-bg">
    <nav class="flex justify-between items-cente py-3 px-6 md:px-44 fixed z-50 w-full animate-fade-down">
        {{-- Logo --}}
        <div data-aos="fade" data-aos-duration="1000" class="flex items-center gap-2">
            <img src="{{ asset('images/logo.svg') }}" width="60" alt="Logo Laundry Notes">
            <h1 class="text-2xl md:text-3xl text-skyBlueDark ">LaundryNotes</h1>
        </div>
    
        {{-- Toogle --}}
        <button id="menu-toggle" class="md:hidden focus:outline-none z-30">
            <iconify-icon icon="material-symbols:menu" width="30" height="30" class="text-fg"></iconify-icon>
        </button>
    
        {{-- Menu --}}
        <div class="hidden md:flex md:gap-10 items-center">
            <a href="#beranda" class="text-fg hover:text-skyBlueDark hover:font-semibold transition-all">Beranda</a>
            <a href="#caraKerja" class="text-fg hover:text-skyBlueDark hover:font-semibold transition-all">Cara Kerja</a>
            <a href="#paket" class="text-fg hover:text-skyBlueDark hover:font-semibold transition-all">Paket</a>
        </div>
    
        {{-- Menu Sidebar --}}
        <div id="sidebar" class="fixed top-0 right-0 h-full w-64 bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-40 md:hidden">
            <div class="flex flex-col p-6 gap-6">
                <button id="menu-close" class="self-end">
                    <iconify-icon icon="material-symbols:close" width="26" height="26" class="text-fg"></iconify-icon>
                </button>
                <a href="#beranda" data-aos="fade-left" data-aos-duration="2000" class="text-fg hover:text-skyBlueDark font-medium text-lg transition">Beranda</a>
                <a href="#caraKerja" data-aos="fade-left" data-aos-duration="2000" class="text-fg hover:text-skyBlueDark font-medium text-lg transition">Cara Kerja</a>
                <a href="#paket" data-aos="fade-left" data-aos-duration="2000" class="text-fg hover:text-skyBlueDark font-medium text-lg transition">Paket</a>
            </div>
        </div>
        {{-- Overlay --}}
        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-30 md:hidden"></div>
    </nav>  
    
    {{-- Section awal --}}
    <section id="beranda" class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center justify-items-center py-20 px-6 md:px-44 relative overflow-hidden">
        <div class="flex flex-col gap-4 bg-transparent z-20 h-[400px] justify-center animate-fade-left">
            <h1 class="text-2xl md:text-5xl font-bold text-fg">Kalau bukan hari ini <b class="text-skyBlueDark">cucinya</b>, besok siap-siap tanpa baju.</h1>
            <p class="text-base md:text-lg text-fg">Cuci, kering, lipat. Hemat waktu, hemat biaya. Antar-jemput? Siap!</p>
            <a href="#caraKerja" class="bg-skyBlueDark w-fit text-white font-semibold px-6 py-4 rounded-full">Bagaimana Cara Kerjanya?</a>
        </div>
        <div class="hidden md:block animate-fade-right">
            <img src="{{asset('images/cucianGelembung.svg')}}" class="w-[400px] md:w-[650px]" alt="">
        </div>
    </section>

    {{-- Section langkah --}}
    <section id="caraKerja" class="py-10 px-6 md:px-44 bg-skyBlue flex flex-col justify-center items-center gap-4">
        <p data-aos="zoom-in" data-aos-duration="1000" class="text-skyBlueDark">Cara Kerja</p>
        <h1 data-aos="zoom-in" data-aos-duration="1000" class="text-2xl md:text-5xl font-bold text-fg">Selesai dalam 4 tahap</h1>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-10">
            <div data-aos="fade-up" data-aos-duration="2000" class="bg-bg flex flex-col gap-4 p-4 md:p-6 justify-center items-center rounded-lg shadow-md">
                <p class="text-skyBlueDark">Langkah 1</p>
                <h1 class="text-xl md:text-4xl font-bold text-fg">Penjemputan</h1>
                <img src="{{asset('images/address.svg')}}" alt="" class="w-[200px] md:w-[300px] h-[150px] md:h-[200px]">
            </div>
            <div data-aos="fade-up" data-aos-duration="2000" class="bg-bg flex flex-col gap-1 lg:gap-0 p-4 md:p-6 justify-center items-center rounded-lg shadow-md">
                <p class="text-skyBlueDark">Langkah 2</p>
                <h1 class="text-xl md:text-4xl font-bold text-fg text-center">Cuci & Keringkan</h1>
                <img src="{{asset('images/mesinCuci.svg')}}" alt="" class="w-[200px] md:w-[300px] h-[150px] md:h-[200px]">
            </div>
            <div data-aos="fade-up" data-aos-duration="2000" class="bg-bg flex flex-col gap-4 p-4 md:p-6 justify-center items-center rounded-lg shadow-md">
                <p class="text-skyBlueDark">Langkah 3</p>
                <h1 class="text-xl md:text-4xl font-bold text-fg">Lipat</h1>
                <img src="{{asset('images/mesinPakaian.svg')}}" alt="" class="w-[200px] md:w-[300px] h-[150px] md:h-[200px]">
            </div>
            <div data-aos="fade-up" data-aos-duration="2000" class="bg-bg flex flex-col gap-4 p-4 md:p-6 justify-center items-center rounded-lg shadow-md">
                <p class="text-skyBlueDark">Langkah 4</p>
                <h1 class="text-xl md:text-4xl font-bold text-fg">Pengantaran</h1>
                <img src="{{asset('images/pesanOrang.svg')}}" alt="" class="w-[200px] md:w-[300px] h-[150px] md:h-[200px]">
            </div>
        </div>
    </section>
    
    <section id="paket" class="py-10 px-6 md:px-44 flex flex-col justify-center items-center gap-4">
        <p data-aos="zoom-in" class="text-skyBlueDark">Paket Layanan</p>
        <h1 data-aos="zoom-in" class="text-2xl md:text-5xl font-bold text-fg">Paket Terlaris</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-10">
            <div data-aos="fade-up" data-aos-duration="2000" class="flex flex-col gap-4 p-4 md:p-6 justify-center items-center rounded-lg shadow-md bg-bg">
                <h1 class="text-4xl text-skyBlueDark font-bold">Paket Reguler</h1>
                <p class="text-fg">Benefit:</p>
                <div class="mt-4 flex flex-col gap-2 w-full">
                    <div class="flex gap-2 items-center w-full text-fg">
                        <iconify-icon icon="lets-icons:check-fill" width="24" height="24"></iconify-icon>
                        <p class="text-fg">2-3 hari kerja</p>
                    </div>
                    <div class="flex gap-2 items-center w-full text-fg">
                        <iconify-icon icon="lets-icons:check-fill" width="24" height="24"></iconify-icon>
                        <p class="text-fg">Cuci, kering, dan lipat</p>
                    </div>
                    <div class="flex gap-2 items-center w-full text-fg">
                        <iconify-icon icon="lets-icons:check-fill" width="24" height="24"></iconify-icon>
                        <p class="text-fg">Cocok untuk pakaian sehari-hari</p>
                    </div>
                </div>
                <button  class="bg-skyBlueDark w-full text-white font-semibold p-4 mt-4 rounded-full">Rp 7.000/Kg</button>
            </div>
            <div data-aos="fade-up" data-aos-duration="2000" class="flex flex-col gap-4 lg:gap-2 p-4 md:p-6 justify-center items-center rounded-lg shadow-md bg-skyBlue">
                <h1 class="text-4xl text-skyBlueDark font-bold">Paket Express</h1>
                <p class="text-fg">Benefit:</p>
                <div class="mt-4 flex flex-col gap-2 w-full">
                    <div class="flex gap-2 items-center text-fg w-full">
                        <iconify-icon icon="lets-icons:check-fill" width="24" height="24"></iconify-icon>
                        <p class="text-fg">Selesai dalam 24 jam</p>
                    </div>
                    <div class="flex gap-2 items-center text-fg w-full">
                        <iconify-icon icon="lets-icons:check-fill" width="24" height="24"></iconify-icon>
                        <p class="text-fg">Cuci, kering, setrika, dan lipat</p>
                    </div>
                    <div class="flex gap-2 items-center text-fg w-full">
                        <iconify-icon icon="lets-icons:check-fill" width="24" height="24"></iconify-icon>
                        <p class="text-fg">Cocok untuk pakaian kerja atau kebutuhan mendesak</p>
                    </div>
                </div>
                <button  class="bg-skyBlueDark w-full text-white font-semibold p-4 mt-4 rounded-full">Rp 7.000/Kg</button>
            </div>
            <div data-aos="fade-up" data-aos-duration="2000" class="flex flex-col gap-4 p-4 md:p-6 justify-center items-center rounded-lg shadow-md bg-bg">
                <h1 class="text-4xl text-skyBlueDark font-bold">Paket Premium</h1>
                <p class="text-fg">Benefit:</p>
                <div class="mt-4 flex flex-col gap-2 w-full">
                    <div class="flex gap-2 items-center text-fg w-full">
                        <iconify-icon icon="lets-icons:check-fill" width="24" height="24"></iconify-icon>
                        <p class="text-fg">2-3 hari kerja</p>
                    </div>
                    <div class="flex gap-2 items-center text-fg w-full">
                        <iconify-icon icon="lets-icons:check-fill" width="24" height="24"></iconify-icon>
                        <p class="text-fg">Cuci, kering, dan lipat</p>
                    </div>
                    <div class="flex gap-2 items-center text-fg w-full">
                        <iconify-icon icon="lets-icons:check-fill" width="24" height="24"></iconify-icon>
                        <p class="text-fg">Cuci khusus, pewangi premium, setrika</p>
                    </div>
                </div>
                <button  class="bg-skyBlueDark w-full text-white font-semibold p-4 mt-4 rounded-full">Rp 7.000/Kg</button>
            </div>
        </div>
    </section>

    <section data-aos="zoom-in" data-aos-duration="2000" class="py-10 px-6 md:px-44 flex justify-center items-center gap-4">
        <div class="bg-skyBlueDark w-full rounded-lg shadow-md flex flex-col gap-4 p-6 md:p-10 justify-center items-center">
            <h1 class="text-2xl md:text-5xl font-bold text-white text-center">Cucian numpuk? <br> Kami yang beresin!</h1>
            <button  class="bg-white w-fit text-skyBlueDark font-semibold px-6 py-4 mt-4 rounded-full">Laundry Sekarang</button>
        </div>
    </section>

    <footer data-aos="fade" data-aos-duration="2000" class="bg-bg text-fg px-6 md:px-44 py-10">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-6 border-b pb-6">
            <div>
                <h1 class="text-2xl font-bold text-skyBlueDark">LaundryNotes</h1>
            </div>
            <div class="space-y-2">
                <p class="font-semibold">Support</p>
                <a href="#" class="block hover:underline">Help centre</a>
                <a href="#" class="block hover:underline">Account information</a>
                <a href="#" class="block hover:underline">About</a>
                <a href="#" class="block hover:underline">Contact us</a>
            </div>
            <div class="space-y-2">
                <p class="font-semibold">Help and Solution</p>
                <a href="#" class="block hover:underline">Talk to support</a>
                <a href="#" class="block hover:underline">Support docs</a>
                <a href="#" class="block hover:underline">System status</a>
                <a href="#" class="block hover:underline">Covid responde</a>
            </div>
            <div class="space-y-2">
                <p class="font-semibold">Product</p>
                <a href="#" class="block hover:underline">Update</a>
                <a href="#" class="block hover:underline">Security</a>
                <a href="#" class="block hover:underline">Beta test</a>
                <a href="#" class="block hover:underline">Pricing product</a>
            </div>
        </div>
        <p class="text-sm mt-4 text-gray-700">
            © 2025 <strong>LaundryNotes</strong>. Seluruh hak cipta dilindungi. Dikembangkan oleh Kelompok 7 Basis Data Lanjut.
        </p>
    </footer>
    

</div>
@endsection