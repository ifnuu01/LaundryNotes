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
    <form action="">
        <x-input-with-icon
            type="text"
            name="nama_kasir"
            label="Nama Kasir"
            placeholder="Nama Kasir"
            icon="material-symbols:person-outline"
        />
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
                name="berat_cucian"
                label="Berat Cucian"
                placeholder="Berat Cucian"
                icon="mdi:weight-kilogram"
            />
            <x-select-with-icon
                name="layanan"
                label="Paket Layanan"
                icon="material-symbols:local-laundry-service-outline"
                placeholder="Nama Layanan"
            >
                <option value="reguler">Paket Reguler</option>
                <option value="express">Paket Express</option>
            </x-select-with-icon>
        </div>
        <x-input-with-icon
                type="text"
                name="catatan"
                label="Catatan"
                placeholder="Catatan"
                icon="material-symbols:note-outline"
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
            name="status"
            label="Status Pesanan"
            placeholder="Status Pesanan"
            icon="hugeicons:status"
        />
        <div class="flex gap-4 mt-4">
            <x-button text="Ubah Pesanan" icon="tabler:edit"/>
            <x-button text="Kembali" type="button" href="#" asLink="true" icon="mingcute:back-fill"/>
        </div>
    </form>
</div>

@endsection