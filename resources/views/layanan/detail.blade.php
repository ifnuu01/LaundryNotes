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

    {{-- <p>
        <span class="text-fg font-semibold">ID Paket: </span>
        <span class="text-fg">{{$paket->nama}}</span>
    </p> --}}

    <form action="#">
        <x-input-with-icon
        type="text"
        name="nama_paket"
        label="Nama Paket"
        placeholder="Nama Paket"
        icon="material-symbols:local-laundry-service-outline"
        value="{{ $paket->nama }}"
        disabled
    />
    <x-input-with-icon
        type="number"
        name="harga"
        label="Harga"
        placeholder="Harga"
        icon="tdesign:money"
        value="{{$paket->harga_per_kg}}"
        disabled
    />
    <x-input-with-icon
        type="text"
        name="catatan"
        label="Catatan"
        placeholder="Catatan"
        icon="material-symbols:note-outline"
        value="{{$paket->catatan}}"
        disabled
    />
    <x-input-with-icon
        type="text"
        name="status"
        label="Status Paket"
        placeholder="Status Paket"
        icon="hugeicons:status"
        value="{{$paket->status}}"
        disabled
    />
    </form>
    <div class="flex gap-4 mt-4">
        <x-button text="Edit Paket" type="button" href="{{route('layanan.edit', $paket->id)}}" asLink="true" icon="tabler:edit"/>
        <x-button text="Kembali" type="button" href="{{route('layanan.index')}}" asLink="true" icon="mingcute:back-fill" baseStyle="0"/>
    </div>
</div>

@endsection