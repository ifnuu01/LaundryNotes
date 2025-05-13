{{-- filepath: c:\laragon\www\laundry_notes\resources\views\beranda.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Beranda')

@push('styles')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('content')

{{-- Grafik --}}
<div class="bg-white p-6 rounded-lg shadow-md mb-6">
    <h3 class="text-lg font-semibold text-gray-700 mb-4">Statistik Pesanan</h3>
    <canvas id="pesananChart" width="400" height="100"></canvas>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    {{-- Card: Pesanan Proses --}}
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
        <iconify-icon icon="mdi:progress-clock" width="40" height="40" class="text-skyBlueDark"></iconify-icon>
        <div>
            <h3 class="text-lg font-semibold text-gray-700">Pesanan Proses</h3>
            <p class="text-2xl font-bold text-skyBlueDark">{{ $data['pesanan_proses'] }}</p>
        </div>
    </div>

    {{-- Card: Pesanan Selesai --}}
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
        <iconify-icon icon="mdi:check-circle-outline" width="40" height="40" class="text-green-500"></iconify-icon>
        <div>
            <h3 class="text-lg font-semibold text-gray-700">Pesanan Selesai</h3>
            <p class="text-2xl font-bold text-green-500">{{ $data['pesanan_selesai'] }}</p>
        </div>
    </div>

    {{-- Card: Pesanan Dibatalkan --}}
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
        <iconify-icon icon="mdi:cancel" width="40" height="40" class="text-red-500"></iconify-icon>
        <div>
            <h3 class="text-lg font-semibold text-gray-700">Pesanan Dibatalkan</h3>
            <p class="text-2xl font-bold text-red-500">{{ $data['pesanan_dibatalkan'] }}</p>
        </div>
    </div>

    {{-- Card: Total Pesanan --}}
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
        <iconify-icon icon="mdi:clipboard-list-outline" width="40" height="40" class="text-gray-700"></iconify-icon>
        <div>
            <h3 class="text-lg font-semibold text-gray-700">Total Pesanan</h3>
            <p class="text-2xl font-bold text-gray-700">{{ $data['total_pesanan'] }}</p>
        </div>
    </div>

    {{-- Card: Jumlah Kasir --}}
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
        <iconify-icon icon="mdi:account-group-outline" width="40" height="40" class="text-purple-500"></iconify-icon>
        <div>
            <h3 class="text-lg font-semibold text-gray-700">Jumlah Kasir</h3>
            <p class="text-2xl font-bold text-purple-500">{{ $data['jumlah_kasir'] }}</p>
        </div>
    </div>

    {{-- Card: Total Pendapatan --}}
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
        <iconify-icon icon="mdi:cash-multiple" width="40" height="40" class="text-yellow-500"></iconify-icon>
        <div>
            <h3 class="text-lg font-semibold text-gray-700">Total Pendapatan</h3>
            <p class="text-2xl font-bold text-yellow-500">Rp {{ number_format($data['total_pendapatan'], 0, ',', '.') }}</p>
        </div>
    </div>

    {{-- Card: Jumlah Layanan --}}
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
        <iconify-icon icon="mdi:package-variant" width="40" height="40" class="text-indigo-500"></iconify-icon>
        <div>
            <h3 class="text-lg font-semibold text-gray-700">Jumlah Layanan</h3>
            <p class="text-2xl font-bold text-indigo-500">{{ $data['jumlah_layanan'] }}</p>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script>
    const ctx = document.getElementById('pesananChart').getContext('2d');
    const pesananChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Proses', 'Selesai', 'Dibatalkan'],
            datasets: [{
                label: 'Jumlah Pesanan',
                data: [{{ $data['pesanan_proses'] }}, {{ $data['pesanan_selesai'] }}, {{ $data['pesanan_dibatalkan'] }}],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)', // Proses
                    'rgba(75, 192, 192, 0.6)', // Selesai
                    'rgba(255, 99, 132, 0.6)'  // Dibatalkan
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush