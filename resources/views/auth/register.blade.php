@extends('layouts.home')
@section('title', 'Register: Larapets 🐈')

@section('content')
<section class="min-h-screen flex items-center justify-center px-4">
    <div
        class="bg-white/80 backdrop-blur-md rounded-3xl shadow-2xl w-full max-w-2xl p-6 border border-gray-200 text-center">

        {{-- Título --}}
        <h1 class="flex gap-3 justify-center items-center text-2xl font-bold text-amber-700 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 256 256">
                <path
                    d="M200,112a8,8,0,0,1-8,8H152a8,8,0,0,1,0-16h40A8,8,0,0,1,200,112Zm-8,24H152a8,8,0,0,0,0,16h40a8,8,0,0,0,0-16Zm40-80V200a16,16,0,0,1-16,16H40a16,16,0,0,1-16-16V56A16,16,0,0,1,40,40H216A16,16,0,0,1,232,56ZM216,200V56H40V200H216Zm-80.26-34a8,8,0,1,1-15.5,4c-2.63-10.26-13.06-18-24.25-18s-21.61,7.74-24.25,18a8,8,0,1,1-15.5-4,39.84,39.84,0,0,1,17.19-23.34,32,32,0,1,1,45.12,0A39.76,39.76,0,0,1,135.75,166ZM96,136a16,16,0,1,0-16-16A16,16,0,0,0,96,136Z">
                </path>
            </svg>
            Register
        </h1>

        {{-- Formulario --}}
        <form method="POST" action="{{ route('register') }}" class="w-full">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                {{-- Document --}}
                <div>
                    <label class="label text-gray-700 font-medium text-sm">Document</label>
                    <input type="text" name="document"
                        class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                        placeholder="75123123" value="{{ old('document') }}" />
                    @error('document')
                    <small class="badge badge-error mt-1">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Full Name --}}
                <div>
                    <label class="label text-gray-700 font-medium text-sm">Full Name</label>
                    <input type="text" name="fullname"
                        class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                        placeholder="Jeremias Springfield" value="{{ old('fullname') }}" />
                    @error('fullname')
                    <small class="badge badge-error mt-1">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Gender --}}
                <div>
                    <label class="label text-gray-700 font-medium text-sm mb-1">Gender</label>
                    <select name="gender"
                        class="select select-bordered w-full rounded-lg text-sm bg-white/80 border-gray-300 focus:ring-2 focus:ring-amber-400 focus:border-amber-400">
                        <option value="">Select</option>
                        <option value="Female" @if(old('gender')=='Female' ) selected @endif>Female</option>
                        <option value="Male" @if(old('gender')=='Male' ) selected @endif>Male</option>
                    </select>
                    @error('gender')
                    <small class="badge badge-error mt-1">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Birthdate --}}
                <div>
                    <label class="label text-gray-700 font-medium text-sm">Birthdate</label>
                    <input type="date" name="birthdate"
                        class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                        value="{{ old('birthdate') }}" />
                    @error('birthdate')
                    <small class="badge badge-error mt-1">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Phone --}}
                <div>
                    <label class="label text-gray-700 font-medium text-sm">Phone</label>
                    <input type="text" name="phone"
                        class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                        placeholder="3108326537" value="{{ old('phone') }}" />
                    @error('phone')
                    <small class="badge badge-error mt-1">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="label text-gray-700 font-medium text-sm">Email</label>
                    <input type="email" name="email"
                        class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                        placeholder="example@email.com" value="{{ old('email') }}" />
                    @error('email')
                    <small class="badge badge-error mt-1">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="label text-gray-700 font-medium text-sm">Password</label>
                    <input type="password" name="password"
                        class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                        placeholder="Password" />
                    @error('password')
                    <small class="badge badge-error mt-1">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Password Confirmation --}}
                <div>
                    <label class="label text-gray-700 font-medium text-sm">Password Confirmation</label>
                    <input type="password" name="password_confirmation"
                        class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                        placeholder="Confirm password" />
                    @error('password_confirmation')
                    <small class="badge badge-error mt-1">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            {{-- Botón centrado --}}
            <div class="flex justify-center mt-6">
                <button
                    class="btn btn-outline btn-info px-6 py-1 text-sm font-semibold rounded-lg shadow-sm hover:bg-amber-500 hover:text-white transition-all duration-200">
                    Register
                </button>
            </div>

            {{-- Enlace inferior --}}
            <div class="text-center mt-3 text-gray-700">
                <p class="text-xs">
                    <a class="link link-default hover:text-amber-600" href="{{ route('login') }}">
                        Already Registered?
                    </a>
                </p>
            </div>
        </form>
    </div>
</section>
@endsection