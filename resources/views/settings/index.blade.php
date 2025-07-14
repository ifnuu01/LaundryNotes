@extends('layouts.dashboard')
@section('title', 'Tambah Pesanan')

@section('content')
<div class="flex justify-between items-center mb-4">
    <div class="flex flex-col gap-2">
        <h2 class="text-lg font-semibold text-fg">Ubah Password</h2>
        <p class="text-fg text-sm">Fitur ubah password pada sistem LaundryNotes</p>
    </div>
</div>

<div class="mt-4">
    <form action="{{ route('settings.ubah-password') }}" method="POST" >
        @method('PATCH')
        @csrf
        <x-input-with-icon
            type="password"
            name="password_lama"
            label="Password Lama"
            placeholder="Password Lama"
            icon="material-symbols:lock"
            value="{{ old('password_lama') }}"
        />
        <x-input-with-icon
                type="password"
                name="password_baru"
                label="Password Baru"
                placeholder="Password Baru"
                icon="material-symbols:lock"
                value="{{ old('password_baru') }}"
            />
        <x-input-with-icon
                type="password"
                name="password_baru_confirmation"
                label="Konfirmasi Password"
                placeholder="Konfirmasi Password"
                icon="material-symbols:lock"
                value="{{ old('password_baru_confirmation') }}"
            />
        <div class="flex gap-4 mt-4">
            <x-button text="Ubah Password" type="submit" icon="ic:baseline-plus"/>
            <x-button text="Kembali" type="button" href="{{route('dashboard')}}" asLink="true" icon="mingcute:back-fill" baseStyle="0"/>
        </div>
    </form>
</div>
@endsection
