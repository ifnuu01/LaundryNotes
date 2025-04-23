@extends('layouts.dashboard')
@section('title', 'Detail Pesanan')

@section('content')
<div class="flex justify-between items-center mb-4">
    <div class="flex flex-col gap-2">
        <h2 class="text-lg font-semibold text-fg">Detail Pesanan</h2>
        <p class="text-fg text-sm">Detail pesanan pada sistem LaundryNotes</p>
    </div>
</div>

<div class="mt-4">
    <form action="">
        <div class="flex gap-4">
            <div class="w-1/2">
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
                /></div>
            <div>
                <span class="block mt-4 text-sm text-fg">Struk Pesanan</span>
                <div class="border border-skyBlue rounded-md p-4 mt-1 w-full h-64 flex justify-center items-center">
                    
                </div>
            </div>
        </div>
        <div class="flex gap-4 mt-4 w-full justify-center items-center">
            <x-button text="Cetak Detail" icon="material-symbols:print-outline"/>
            <x-button text="Kembali" type="button" href="#" asLink="true" icon="mingcute:back-fill"/>
        </div>
    </form>
</div>

@endsection