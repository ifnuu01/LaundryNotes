@extends('layouts.laporan')
@section('title', 'LAPORAN JUMLAH PEMESANAN')
@section('tanggalStart', $tanggalStart)
@section('tanggalEnd', $tanggalEnd)

@section('content')
    <div class="overflow-x-auto">
        <table id="pesananTable" class="w-full text-sm border border-gray-300 rounded-lg">
            <thead>
                <tr class="font-bold">
                    <th class="p-2 border border-gray-300">No</th>
                    <th class="p-2 border border-gray-300">Bulan</th>
                    <th class="p-2 border border-gray-300">Jumlah Pemesanan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pemesanan as $index => $item)
                    <tr>
                        <td class="p-2 border border-gray-300">{{$index + 1}}</td>
                        <td class="p-2 border border-gray-300">{{ \Carbon\Carbon::create()->month($item->bulan)->locale('id')->monthName }}</td>
                        <td class="p-2 border text-center border-gray-300">{{$item->jumlah_pesanan}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-2 border border-gray-300 text-center">Tidak ada data pemesanan</td>
                    </tr>
                @endforelse
                    <tr>
                        <td colspan="2" class="p-2 border border-gray-300 text-center font-bold">Total</td>
                        <td class="p-2 border border-gray-300 text-center font-bold">{{ $totalPesanan }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="p-2 border border-gray-300 text-center font-bold">Rata-Rata</td>
                        <td class="p-2 border border-gray-300 text-center font-bold">{{ ceil($pemesanan->avg('jumlah_pesanan')) }}</td>
                    </tr>
            </tbody>
        </table>
    </div>
@endsection