@extends('layouts.dashboard')
@section('title', 'Tambah Kasir')

@section('content')
<div class="flex justify-between items-center mb-4">
    <div class="flex flex-col gap-2">
        <h2 class="text-lg font-semibold text-fg">Tambah Kasir</h2>
        <p class="text-fg text-sm">Menambahkan kasir pada sistem LaundryNotes</p>
    </div>
</div>

<div class="mt-4">
    <form action="{{route('kasir.store')}}" method="POST">
        @method('POST')
        @csrf
        <x-input-with-icon
            type="text"
            name="nama"
            label="Nama Kasir"
            placeholder="Nama Kasir"
            icon="material-symbols:person-outline"
        />
        <x-input-with-icon
                type="email"
                name="email"
                label="Email"
                placeholder="email@gmail.com"
                icon="ic:outline-email"
            />
        <x-input-with-icon
            type="password"
            name="password"
            label="Password"
            placeholder="******"
            icon="mdi:password-outline"
        />
        <div class="flex gap-4 mt-4">
            <x-button text="Tambah Kasir" type="submit" icon="ic:baseline-plus"/>
            <x-button text="Kembali" type="button" href="{{route('kasir.index')}}" asLink="true" icon="mingcute:back-fill" baseStyle="0"/>
        </div>
    </form>
</div>

@endsection