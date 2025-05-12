@extends('layouts.dashboard')
@section('title', 'Tambah Pesanan')

@section('content')
<div class="flex justify-between items-center mb-4">
    <div class="flex flex-col gap-2">
        <h2 class="text-lg font-semibold text-fg">Tambah Pesanan</h2>
        <p class="text-fg text-sm">Menambahkan pesanan pada sistem LaundryNotes</p>
    </div>
</div>

<div class="mt-4">
    <form action="{{ route('pesanan.store') }}" method="POST" >
        @method('POST')
        @csrf
        <x-input-with-icon
            type="text"
            name="nama_pelanggan"
            label="Nama Pelanggan"
            placeholder="Nama Pelanggan"
            icon="ic:baseline-person-add"
        />
        <div class="flex gap-4">
            <x-input-with-icon
                type="number"
                name="berat_kg"
                label="Berat Cucian"
                placeholder="Berat Cucian"
                icon="mdi:weight-kilogram"
            />
            <x-select-with-icon
                name="id_paket"
                label="Paket Layanan"
                icon="material-symbols:local-laundry-service-outline"
                placeholder="Nama Layanan"
            >
                @foreach($pakets as $paket)
                    <option value="{{ $paket->id }}">{{ $paket->nama}}</option>
                @endforeach
            </x-select-with-icon>
        </div>
        <x-input-with-icon
                type="text"
                name="catatan"
                label="Catatan"
                placeholder="Catatan"
                icon="material-symbols:note-outline"
            />
        <div class="flex gap-4 mt-4">
            <x-button text="Tambah Pesanan" icon="ic:baseline-plus"/>
            <x-button text="Kembali" type="button" href="#" asLink="true" icon="mingcute:back-fill"/>
        </div>
    </form>
</div>

@endsection