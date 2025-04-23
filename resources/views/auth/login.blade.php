@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="bg-bg flex justify-center items-center h-screen">
    <div class="bg-white py-6 rounded shadow-md flex">
        <div class="justify-center items-center hidden md:flex flex-col w-1/2 p-4">
            <img src="{{asset('images/cucian.svg')}}" alt="">
        </div>
        <form action="" class="flex flex-col justify-center items-center w-full md:w-1/2 p-4">
            <img src="{{asset('images/logo.svg')}}" alt="">
            <p class="text-sm text-fg text-center">Silahkan gunakan <b class="text-skyBlueDark">email</b> anda untuk masuk</p>
            <x-input-with-icon
                type="email"
                name="email"
                label="Username"
                placeholder="email@gmail.com"
                icon="material-symbols:person-outline"
            />

            <x-input-with-icon
                type="password"
                name="password"
                label="Password"
                placeholder="******"
                icon="mdi:password-outline"
            />
            <div class="mt-4 w-full">
                <x-button text="Masuk" icon="material-symbols:login" width="w-full"/>
            </div>

        </form>
    </div>
</div>
@endsection