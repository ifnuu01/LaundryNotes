@extends('layouts.dashboard')
@section('title', 'Detail Paket Layanan')

@section('content')
<div class="flex justify-between items-center mb-4">
    <div class="flex flex-col gap-2">
        <h2 class="text-lg font-semibold text-fg">Detail Paket Layanan</h2>
        <p class="text-fg text-sm">Detail paket layanan pada sistem LaundryNotes</p>
    </div>
</div>

<div class="mt-4">
    <form action="">
        <x-input-with-icon
            type="text"
            name="nama_paket"
            label="Nama Paket"
            placeholder="Nama Paket"
            icon="material-symbols:local-laundry-service-outline"
        />
        <x-input-with-icon
                type="number"
                name="harga"
                label="Harga"
                placeholder="Harga"
                icon="tdesign:money"
            />
        <x-input-with-icon
                type="text"
                name="catatan"
                label="Catatan"
                placeholder="Catatan"
                icon="material-symbols:note-outline"
            />
        <x-input-with-icon
                type="text"
                name="status"
                label="Status Paket"
                placeholder="Status Paket"
                icon="hugeicons:status"
            />

    </form>
</div>

@endsection