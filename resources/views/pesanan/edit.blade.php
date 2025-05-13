@extends('layouts.dashboard')
@section('title', 'Ubah Pesanan')

@section('content')
<div class="flex justify-between items-center mb-4">
    <div class="flex flex-col gap-2">
        <h2 class="text-lg font-semibold text-fg">Ubah Pesanan</h2>
        <p class="text-fg text-sm">Mengubah pesanan pada sistem LaundryNotes</p>
    </div>
</div>

<div class="mt-4">
    <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
        @method('PUT')
        @csrf
        <x-input-with-icon
            type="text"
            name="nama_pelanggan"
            label="Nama Pelanggan"
            placeholder="Nama Pelanggan"
            icon="ic:baseline-person-add"
            value="{{ $pesanan->nama_pelanggan }}"
        />
        <div class="flex gap-4">
            <x-input-with-icon
                type="number"
                name="berat_kg"
                label="Berat Cucian"
                placeholder="Berat Cucian"
                icon="mdi:weight-kilogram"
                value="{{ $pesanan->berat_kg }}"
            />
            <x-select-with-icon
                name="paket_id"
                label="Paket Layanan"
                icon="material-symbols:local-laundry-service-outline"
                placeholder="Nama Layanan"
            >
                @foreach($pakets as $paket)
                    <option value="{{ $paket->id }}" {{ $pesanan->paket_id == $paket->id ? 'selected' : '' }}>{{ $paket->nama}}</option>
                @endforeach
            </x-select-with-icon>
        </div>
        <x-input-with-icon
                type="text"
                name="catatan"
                label="Catatan"
                placeholder="Catatan"
                icon="material-symbols:note-outline"
                value="{{ $pesanan->catatan }}"
            />
        <x-input-with-icon
                type="text"
                name="harga"
                label="Harga"
                placeholder="Harga"
                icon="tdesign:money"
                value="Rp {{ number_format($harga_total, 0, ',', '.') }}"
                disabled
            />
        <x-select-with-icon
                name="status"
                label="Status"
                icon="material-symbols:local-laundry-service-outline"
                placeholder="Status"
            >
                <option value="Proses" {{ $pesanan->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                <option value="Selesai" {{ $pesanan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="Dibatalkan" {{ $pesanan->status == 'Dibatalkan' ? 'selected' : '' }}>Batal</option>
        </x-select-with-icon>
        <div class="flex gap-4 mt-4">
            <x-button text="Ubah Pesanan" type="submit" icon="tabler:edit"/>
            <x-button text="Kembali" type="button" href="{{route('pesanan.index')}}" asLink="true" icon="mingcute:back-fill" baseStyle="0"/>
        </div>
    </form>
</div>

@endsection