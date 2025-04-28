    @extends('layouts.app')
    @section('title', 'Login')
    @section('content')
    <div class="bg-bg flex justify-center items-center h-screen">
        <div class="bg-white py-6 rounded shadow-md flex">
            <div class="justify-center items-center hidden md:flex flex-col w-1/2 p-4">
                <img src="{{asset('images/cucian.svg')}}" alt="">
            </div>
            <form action="{{route('login-proses')}}" method="post" class="flex flex-col justify-center items-center w-full md:w-1/2 p-4">
                @csrf
                <img src="{{asset('images/logo.svg')}}" alt="">
                <p class="text-sm text-fg text-center">Silahkan gunakan <b class="text-skyBlueDark">email</b> anda untuk masuk</p>
                <x-input-with-icon
                    type="text"
                    name="email"
                    placeholder="email@gmail.com"
                    label="Username"
                    icon="material-symbols:person-outline"
                />
                @error('email')
                    <div class="text-red-500 text-sm mt-1 w-full">{{ $message }}</div>
                @enderror
                <x-input-with-icon
                    type="password"
                    name="password"
                    label="Password"
                    placeholder="******"
                    icon="mdi:password-outline"
                />
                @error('password')
                    <div class="text-red-500 text-sm mt-1 w-full">{{ $message }}</div>
                @enderror
                <div class="mt-4 w-full">
                    <x-button text="Masuk" icon="material-symbols:login" width="w-full"/>
                </div>

            </form>
        </div>
    </div>
    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if($message = Session::get('failed'))
        <script>
        Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "{{$message}}",
        });
        </script>
    @endif
    @endsection
