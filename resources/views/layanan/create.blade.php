@extends('layouts.dashboard')
@section('title', 'Tambah Paket Layanan')

@section('content')
<div class="flex justify-between items-center mb-4">
    <div class="flex flex-col gap-2">
        <h2 class="text-lg font-semibold text-fg">Tambah Paket Layanan</h2>
        <p class="text-fg text-sm">Menambahkan paket layanan pada sistem LaundryNotes</p>
    </div>
</div>

<div class="mt-4">
    <form action="{{route('layanan.store')}}" method="POST">
        @method('POST')
        @csrf
        <x-input-with-icon
            type="text"
            name="nama"
            label="Nama Paket"
            placeholder="Nama Paket"
            icon="material-symbols:local-laundry-service-outline"
        />
        <x-input-with-icon
                type="number"
                name="harga_per_kg"
                label="Harga Per Kg"
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
        
        <div class="flex gap-4 mt-4">
            <x-button text="Tambah Paket" type="submit" icon="ic:baseline-plus"/>
            <x-button text="Kembali" type="button" href="{{route('layanan.index')}}" asLink="true" icon="mingcute:back-fill" baseStyle="0"/>
        </div>
    </form>
</div>

@endsection