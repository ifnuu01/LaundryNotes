@extends('layouts.laporan')
@section('title', 'LAPORAN PAKET TERLARIS')
@section('tanggalStart', $tanggalStart)
@section('tanggalEnd', $tanggalEnd)

@section('content')
    <div class="overflow-x-auto">
        <table id="pesananTable" class="w-full text-sm border border-gray-300 rounded-lg">
            <thead>
                <tr class="font-bold">
                    <th class="p-2 border border-gray-300">No</th>
                    <th class="p-2 border border-gray-300">Nama Paket</th>
                    <th class="p-2 border border-gray-300">Jumlah Dipesan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($paketTerlaris as $index => $item)
                    <tr>
                        <td class="p-2 border border-gray-300">{{$index + 1}}</td>
                        <td class="p-2 border border-gray-300">{{ $item->nama }}</td>
                        <td class="p-2 border text-center border-gray-300">{{ $item->jumlah_dipesan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-2 border border-gray-300 text-center">Tidak ada data pemesanan</td>
                    </tr>
                @endforelse
                {{-- paket terlaris --}}
                <tr>
                    <td colspan="2" class="p-2 border border-gray-300 text-center font-bold">Paket Terlaris</td>
                    <td class="p-2 border border-gray-300 text-center font-bold">{{ $paketTerlaris->first()->nama ?? '-' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection