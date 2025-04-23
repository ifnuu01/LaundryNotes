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
        <div class="flex gap-4 mt-4">
            <x-button text="Ubah Paket" icon="tabler:edit"/>
            <x-button text="Kembali" type="button" href="#" asLink="true" icon="mingcute:back-fill"/>
        </div>
    </form>
</div>

@endsection