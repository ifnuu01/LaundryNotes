@extends('layouts.dashboard')
@section('title', 'Tambah Pesanan')


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    function hitungTotal() {
        const berat = parseFloat(document.getElementById('berat_kg').value) || 0;
        const paket = document.getElementById('paket_id');
        const hargaPerKg = paket.options[paket.selectedIndex]?.getAttribute('data-harga') || 0;
        const total = berat * hargaPerKg;
        document.getElementById('harga_total').value = total ? 'Rp ' + Number(total).toLocaleString('id-ID') : '';
    }

    document.getElementById('berat_kg').addEventListener('input', hitungTotal);
    document.getElementById('paket_id').addEventListener('change', hitungTotal);
});
</script>
@endpush

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
            value="{{ old('nama_pelanggan') }}"
        />
        <div class="flex gap-4">
            <x-input-with-icon
                type="number"
                name="berat_kg"
                label="Berat Cucian"
                placeholder="Berat Cucian"
                icon="mdi:weight-kilogram"
                value="{{ old('berat_kg') }}"
                id="berat_kg"
            />
            <x-select-with-icon
                name="paket_id"
                label="Paket Layanan"
                icon="material-symbols:local-laundry-service-outline"
                placeholder="Nama Layanan"
                id="paket_id"
            >
                @foreach($pakets as $paket)
                    <option value="{{ $paket->id }}" data-harga="{{ $paket->harga_per_kg }}">{{ $paket->nama}}</option>
                @endforeach
            </x-select-with-icon>
        </div>
        <div class="flex gap-4">
            <x-input-with-icon
                type="text"
                name="harga_total"
                label="Harga Total"
                placeholder="Harga Total"
                icon="tdesign:money"
                value=""
                disabled
                id="harga_total"
            />
            <x-input-with-icon
                type="number"
                name="bayar"
                label="Bayar"
                placeholder="Bayar"
                icon="tdesign:money"
                value="{{ old('bayar') }}"
            />
        </div>
        <x-input-with-icon
                type="text"
                name="catatan"
                label="Catatan"
                placeholder="Catatan"
                icon="material-symbols:note-outline"
                value="{{ old('catatan') }}"
            />
        <div class="flex gap-4 mt-4">
            <x-button text="Tambah Pesanan" type="submit" icon="ic:baseline-plus"/>
            <x-button text="Kembali" type="button" href="{{route('pesanan.index')}}" asLink="true" icon="mingcute:back-fill" baseStyle="0"/>
        </div>
    </form>
</div>
@endsection
