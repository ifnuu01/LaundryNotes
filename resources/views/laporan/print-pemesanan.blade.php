@extends('layouts.app')

@section('content')
<h1>Laporan Jumlah Pemesanan</h1>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Bulan</th>
            <th>Jumlah Pemesanan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pemesanan as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ \Carbon\Carbon::create()->month($item->bulan)->locale('id')->monthName }}</td>
            <td>{{ $item->jumlah_pesanan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection