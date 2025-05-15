<!DOCTYPE html>
<html lang="id">
<head>
    <title>Struk Laundry</title>
    @vite(['resources/css/app.css']) 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @media print{
            @page {
                size: A5 portrait;
                margin: 10mm;
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
    <div class="max-w-md mx-auto p-4 text-sm">
        <div class="text-center font-bold text-lg tracking-widest">LAUNDRY NOTES</div>
        <div class="text-center">Jl. Kuaro, Gn. Kelua</div>
        <div class="text-center mb-4">0895 0160 3099</div>
        <div class="mb-2">Pelanggan: <span class="font-semibold">{{ $pesanan->nama_pelanggan }}</span></div>
        <div class="border-t border-dashed border-black my-2"></div>
        <div class="flex justify-between">
            <span>ID : {{ $pesanan->id }}</span>
            <span>Kasir : {{ $pesanan->user->nama }}</span>
        </div>
        <div class="mb-2">Tgl : {{ \Carbon\Carbon::parse($pesanan->tanggal_pesan)->format('d/m/Y') }}</div>
        <div class="border-t border-dashed border-black my-2"></div>
        <div class="flex justify-between">
            <span>CUCI {{ $pesanan->berat_kg }} KG</span>
            <span>Rp {{ number_format($harga_total, 0, ',', '.') }}</span>
        </div>
        <div class="mb-2">{{ $pesanan->berat_kg }} x {{ number_format($pesanan->paket->harga_per_kg, 0, ',', '.') }}</div>
        <div class="border-t border-dashed border-black my-2"></div>
        <div class="flex justify-between">
            <span>TOTAL</span>
            <span class="font-semibold">Rp {{ number_format($harga_total, 0, ',', '.') }}</span>
        </div>
        <div class="flex justify-between">
            <span>CASH</span>
            <span>Rp {{ number_format($pesanan->bayar, 0, ',', '.') }}</span>
        </div>
        <div class="flex justify-between mb-2">
            <span>KEMBALI</span>
            <span>Rp {{ number_format($kembali, 0, ',', '.') }}</span>
        </div>
        <div class="border-t border-dashed border-black my-2"></div>
        <div class="text-center mt-6 text-xs leading-relaxed">
            MOHON PERIKSA KEMBALI HASIL CUCIAN<br>
            HASIL CUCIAN YANG SUDAH DIBAWAH PULANG<br>
            DILUAR TANGGUNG JAWAB KAMI
        </div>
    </div>
</body>
</html>