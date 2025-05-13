@extends('layouts.dashboard')
@section('title', 'Detail Riwayat')

@section('content')
<div class="flex justify-between items-center mb-4">
    <div class="flex flex-col gap-2">
        <h2 class="text-lg font-semibold text-fg">Detail Riwayat</h2>
        <p class="text-fg text-sm">Detail riwayat pada sistem LaundryNotes</p>
    </div>
</div>

<div class="mt-4">
    <form action="">
        <div class="flex gap-4">
            <div class="w-full">
                <x-input-with-icon
                type="text"
                name="nama_kasir"
                label="Nama Kasir"
                placeholder="Nama Kasir"
                icon="material-symbols:person-outline"
                value="{{ $riwayat->user->nama }}"
                disabled
            />
            <x-input-with-icon
                type="text"
                name="nama_pelanggan"
                label="Nama Pelanggan"
                placeholder="Nama Pelanggan"
                icon="ic:baseline-person-add"
                value="{{ $riwayat->nama_pelanggan }}"
                disabled
            />
            <div class="flex gap-4">
                <x-input-with-icon
                    type="number"
                    name="berat_cucian"
                    label="Berat Cucian"
                    placeholder="Berat Cucian"
                    icon="mdi:weight-kilogram"
                    value="{{ $riwayat->berat_kg }}"
                    disabled
                />
                <x-input-with-icon
                    type="text"
                    name="status"
                    label="Status"
                    placeholder="Status"
                    icon="material-symbols:local-laundry-service-outline"
                    value="{{ $riwayat->status }}"
                    disabled
                />
            </div>
            <x-input-with-icon
                    type="text"
                    name="catatan"
                    label="Catatan"
                    placeholder="Catatan"
                    icon="material-symbols:note-outline"
                    value="{{ $riwayat->catatan }}"
                    disabled
                />
            <x-input-with-icon
                    type="text"
                    name="harga"
                    label="Harga Total"
                    placeholder="Harga"
                    icon="tdesign:money"
                    value="Rp {{ number_format($harga_total, 0, ',', '.') }}"
                    disabled
                />
            </div>
        </div>
        <div class="flex gap-4">
            <x-input-with-icon
                type="text"
                name="tanggal_pesan"
                label="Tanggal Pesanan"
                placeholder="Tanggal Pesan"
                icon="fluent-mdl2:date-time"
                value="{{ $riwayat->tanggal_pesan }}"
                disabled
            />
            <x-input-with-icon
                type="text"
                name="tanggal_selesai"
                label="Tanggal Selesai"
                placeholder="Tanggal Selesai"
                icon="fluent-mdl2:date-time"
                value="{{ $riwayat->tanggal_selesai }}"
                disabled
            />
        </div>
        <div class="flex gap-4 mt-4 w-full justify-center items-center">
            <x-button text="Cetak Detail" icon="material-symbols:print-outline"/>
            <x-button text="Kembali" type="button" href="{{route('riwayat.index')}}" asLink="true" icon="mingcute:back-fill" baseStyle="0"/>
        </div>
    </form>
</div>

@endsection