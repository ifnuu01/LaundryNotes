{{-- filepath: c:\laragon\www\laundry_notes\resources\views\kasir\edit.blade.php --}}
@extends('layouts.dashboard')
@section('title', 'Ubah Kasir')

@section('content')
<div class="flex justify-between items-center mb-4">
    <div class="flex flex-col gap-2">
        <h2 class="text-lg font-semibold text-fg">Ubah Kasir</h2>
        <p class="text-fg text-sm">Mengubah kasir pada sistem LaundryNotes</p>
    </div>
</div>

<div class="mt-4">
    <form action="{{ route('kasir.update', $user->id) }}" method="POST">
        @method('PUT')
        @csrf
        <x-input-with-icon
            type="text"
            name="nama"
            label="Nama Kasir"
            placeholder="Nama Kasir"
            icon="material-symbols:person-outline"
            value="{{ old('nama', $user->nama) }}"
        />
        <x-input-with-icon
            type="email"
            name="email"
            label="Email"
            placeholder="email@gmail.com"
            icon="ic:outline-email"
            value="{{ old('email', $user->email) }}"
        />
        <x-input-with-icon
            type="password"
            name="password"
            label="Ubah Password"
            placeholder="******"
            icon="mdi:password-outline"
        />
        <div class="flex gap-4 mt-4">
            <x-button text="Ubah Kasir" icon="tabler:edit"/>
            <x-button text="Kembali" type="button" href="{{ route('kasir.index') }}" asLink="true" icon="mingcute:back-fill"/>
        </div>
    </form>
</div>

@endsection