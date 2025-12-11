@extends('layouts.home')
@section('title', 'Login: Larapets 🐈')

@section('content')
<section class="min-h-screen flex items-center justify-center px-4">
    <div
        class="bg-white/80 backdrop-blur-md rounded-3xl shadow-2xl w-[420px] p-8 flex flex-col gap-6 items-center justify-center border border-gray-200 text-center">

        {{-- Título --}}
        <h1 class="flex gap-3 justify-center items-center text-3xl font-bold text-amber-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-amber-600" fill="currentColor"
                viewBox="0 0 256 256">
                <path
                    d="M141.66,133.66l-40,40a8,8,0,0,1-11.32-11.32L116.69,136H24a8,8,0,0,1,0-16h92.69L90.34,93.66a8,8,0,0,1,11.32-11.32l40,40A8,8,0,0,1,141.66,133.66ZM200,32H136a8,8,0,0,0,0,16h56V208H136a8,8,0,0,0,0,16h64a8,8,0,0,0,8-8V40A8,8,0,0,0,200,32Z" />
            </svg>
            Login
        </h1>

        {{-- Formulario --}}
        <form method="POST" action="{{ route('login') }}" class="w-full">
            @csrf

            <div class="card w-full max-w-sm mx-auto">
                <div class="card-body flex flex-col gap-4">

                    {{-- Email --}}
                    <div class="text-left">
                        <label class="label text-gray-700 font-medium">Email</label>
                        <input type="email" name="email"
                            class="input input-bordered w-full rounded-xl focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                            placeholder="email@example.com" value="{{ old('email') }}" required />
                        @error('email')
                        <small class="badge badge-error mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="text-left">
                        <label class="label text-gray-700 font-medium">Password</label>
                        <input type="password" name="password"
                            class="input input-bordered w-full rounded-xl focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                            placeholder="Password" required />
                        @error('password')
                        <small class="badge badge-error mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Botón --}}
                    <button type="submit"
                        class="btn btn-outline btn-info mt-4 w-full font-semibold rounded-xl shadow-md hover:bg-amber-500 hover:text-white transition-all duration-200">
                        Login
                    </button>

                    {{-- Enlaces inferiores --}}
                    <div class="text-center mt-4 space-y-2 text-gray-700">
                        <p class="text-sm">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="link text-amber-600 font-medium hover:underline">
                                Sign up
                            </a>
                        </p>
                        <p class="text-sm">
                            <a class="link text-amber-600 font-medium hover:underline"
                                href="{{ route('password.request') }}">
                                Forgot your password?
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection