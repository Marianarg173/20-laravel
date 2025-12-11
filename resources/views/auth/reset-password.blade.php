{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('layouts.home')
@section('title', 'Reset your password: Larapets 🐶')

@section('content')
<section class="min-h-screen flex items-center justify-center px-4">
    <div
        class="bg-white/80 backdrop-blur-md rounded-3xl shadow-2xl w-[420px] p-8 flex flex-col gap-6 items-center justify-center border border-gray-200 text-center">

        {{-- Título --}}
        <h1 class="flex gap-3 justify-center items-center text-3xl font-bold text-amber-700">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 256 256">
                <path
                    d="M48,56V200a8,8,0,0,1-16,0V56a8,8,0,0,1,16,0Zm92,54.5L120,117V96a8,8,0,0,0-16,0v21L84,110.5a8,8,0,0,0-5,15.22l20,6.49-12.34,17a8,8,0,1,0,12.94,9.4l12.34-17,12.34,17a8,8,0,1,0,12.94-9.4l-12.34-17,20-6.49A8,8,0,0,0,140,110.5ZM246,115.64A8,8,0,0,0,236,110.5L216,117V96a8,8,0,0,0-16,0v21l-20-6.49a8,8,0,0,0-4.95,15.22l20,6.49-12.34,17a8,8,0,1,0,12.94,9.4l12.34-17,12.34,17a8,8,0,1,0,12.94-9.4l-12.34-17,20-6.49A8,8,0,0,0,246,115.64Z">
                </path>
            </svg>
            Reset Password
        </h1>

        {{-- Formulario --}}
        <form method="POST" action="{{ route('password.store') }}" class="w-full">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="card w-full max-w-sm mx-auto">
                <div class="card-body flex flex-col gap-4">

                    {{-- Email --}}
                    <div class="text-left">
                        <label class="label text-gray-700 font-medium">Email</label>
                        <input type="email" name="email"
                            class="input input-bordered w-full rounded-xl focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                            placeholder="example@email.com" value="{{ old('email') }}" required />
                        @error('email')
                        <small class="badge badge-error mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="text-left">
                        <label class="label text-gray-700 font-medium">New Password</label>
                        <input type="password" name="password"
                            class="input input-bordered w-full rounded-xl focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                            placeholder="Enter new password" required />
                        @error('password')
                        <small class="badge badge-error mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Confirmación --}}
                    <div class="text-left">
                        <label class="label text-gray-700 font-medium">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                            class="input input-bordered w-full rounded-xl focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                            placeholder="Confirm password" required />
                        @error('password_confirmation')
                        <small class="badge badge-error mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Botón --}}
                    <button type="submit"
                        class="btn btn-outline btn-info mt-4 w-full font-semibold rounded-xl shadow-md hover:bg-amber-500 hover:text-white transition-all duration-200">
                        Reset Password
                    </button>

                </div>
            </div>
        </form>
    </div>
</section>
@endsection