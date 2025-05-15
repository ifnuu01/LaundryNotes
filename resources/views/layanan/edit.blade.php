@extends('layouts.dashboard')
@section('title', 'Ubah Paket Layanan')

@section('content')
<div class="flex justify-between items-center mb-4">
    <div class="flex flex-col gap-2">
        <h2 class="text-lg font-semibold text-fg">Ubah Paket Layanan</h2>
        <p class="text-fg text-sm">Mengubah paket layanan pada sistem LaundryNotes</p>
    </div>
</div>

<div class="mt-4">
    <form action="{{route('layanan.update', $paket->id)}}" method="POST">
        @method('PUT')
        @csrf
        <x-input-with-icon
            type="text"
            name="nama"
            label="Nama Paket"
            placeholder="Nama Paket"
            icon="material-symbols:local-laundry-service-outline"
            value="{{ $paket->nama }}"
        />
        <x-input-with-icon
            type="number"
            name="harga_per_kg"
            label="Harga"
            placeholder="Harga"
            icon="tdesign:money"
            value="{{ $paket->harga_per_kg }}"
        />
        <x-input-with-icon
            type="text"
            name="catatan"
            label="Catatan"
            placeholder="Catatan"
            icon="material-symbols:note-outline"
            value="{{ $paket->catatan }}"
        />
        <x-select-with-icon
                name="status"
                label="Status Paket"
                icon="hugeicons:status"
            >
                <option value="Aktif" {{ $paket->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Nonaktif" {{ $paket->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
        </x-select-with-icon>
        <div class="flex gap-4 mt-4">
            <x-button text="Ubah Paket" type="submit" icon="tabler:edit"/>
            <x-button text="Kembali" type="button" href="{{route('layanan.index')}}" asLink="true" icon="mingcute:back-fill" baseStyle="0"/>
        </div>
    </form>
</div>

@endsection