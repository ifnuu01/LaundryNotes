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
                    <th class="p-2 border border-gray-300">Bulan</th>
                    <th class="p-2 border border-gray-300">Jumlah Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pendapatan as $index => $item)
                    <tr>
                        <td class="p-2 border border-gray-300">{{$index + 1}}</td>
                        <td class="p-2 border border-gray-300">{{ \Carbon\Carbon::create()->month($item->bulan)->locale('id')->monthName }}</td>
                        <td class="p-2 border border-gray-300">Rp {{ number_format($item->total_pendapatan, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-2 border border-gray-300 text-center">Tidak ada data pemesanan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection