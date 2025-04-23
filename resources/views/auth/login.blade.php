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
            <div class="flex flex-col mt-4 w-full">
                <label for="email" class="text-sm text-fg">Email</label>
                <div class="flex items-center border rounded-md px-2 mt-1 focus:outline-none hover:ring-2 hover:ring-skyBlueDark">
                    <iconify-icon icon="material-symbols:person-outline" class="text-fg" width="24" height="24"></iconify-icon>
                    <input type="email" name="email" id="email" class="rounded-md p-2 outline-none" placeholder="email@gmail.com" required>
                </div>
            </div>
            <div class="flex flex-col mt-4 w-full">
                <label for="email" class="text-sm text-fg">Password</label>
                <div class="flex items-center border rounded-md px-2 mt-1 focus:outline-none hover:ring-2 hover:ring-skyBlueDark">
                    <iconify-icon icon="mdi:password-outline" class="text-fg" width="24" height="24"></iconify-icon>
                    <input type="password" name="email" id="email" class="rounded-md p-2 outline-none" placeholder="*****" required>
                </div>
            </div>
            <button class="mt-4 w-full bg-skyBlueDark p-2 rounded-md text-white text-base ">Login</button>
        </form>
    </div>
</div>
@endsection