@extends('layouts.laporan')
@section('title', 'LAPORAN PENDAPATAN')
@section('tanggalStart', $tanggalStart)
@section('tanggalEnd', $tanggalEnd)

@section('content')
    <div class="overflow-x-auto">
        <table id="pesananTable" class="w-full text-sm border border-gray-300 rounded-lg">
            <thead>
                <tr class="font-bold">
                    <th class="p-2 border border-gray-300">No</th>
                    <th class="p-2 border border-gray-300">Nama Kasir</th>
                    <th class="p-2 border border-gray-300">Jumlah Pesanan Ditangani</th>
                    <th class="p-2 border border-gray-300">Jumlah Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kinerjaKasir as $index => $item)
                    <tr>
                        <td class="p-2 border border-gray-300">{{$index + 1}}</td>
                        <td class="p-2 border border-gray-300">{{ $item->nama_kasir }}</td>
                        <td class="p-2 border border-gray-300">{{ $item->jumlah_pesanan }}</td>
                        <td class="p-2 border border-gray-300">Rp {{ number_format($item->total_pendapatan, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-2 border border-gray-300 text-center">Tidak ada data pemesanan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection