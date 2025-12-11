@extends('layouts.dashboard')

@section('title', 'Detalles de Adopción | Larapets 🐶')

@section('content')

<header class="mb-10 pt-4 border-b border-gray-700/50">
    <h1 class="text-4xl font-extrabold text-[#5EC9A5] tracking-tight flex items-center gap-4 justify-center pb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#A8F1D0]" viewBox="0 0 256 256">
            <path fill="currentColor"
                d="M223,57a58.07,58.07,0,0,0-81.92-.1L128,69.05,114.91,56.86A58,58,0,0,0,33,139l89.35,90.66a8,8,0,0,0,11.4,0L223,139a58,58,0,0,0,0-82Zm-11.35,70.76L128,212.6,44.3,127.68a42,42,0,0,1,59.4-59.4l.2.2,18.65,17.35a8,8,0,0,0,10.9,0L152.1,68.48l.2-.2a42,42,0,1,1,59.36,59.44Z">
            </path>
        </svg>
        Detalles de la Adopción
    </h1>
    {{-- Breadcrumbs --}}
    <div class="breadcrumbs text-sm text-gray-700 dark:text-black mb-6 flex justify-center">

        <ul>
            <li>
                <a href="{{ url('dashboard') }}" class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ url('adoptions') }}" class="flex items-center gap-1">
                    Modulo de Adopciones
                </a>
            </li>
            <li>
                <span>Show Adoption</span>
            </li>
        </ul>
    </div>

    <div class="bg-[#1F2937] p-8 md:p-12 rounded-3xl shadow-2xl max-w-4xl mx-auto border border-gray-700">


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-12">

            {{-- COL 1: MASCOTA --}}
            <div class="lg:col-span-1 flex flex-col items-center">
                <h3 class="text-2xl font-bold text-[#A8F1D0] mb-4 border-b pb-2 border-gray-700/50 w-full text-center">
                    La Mascota</h3>

                <div
                    class="relative w-full max-w-xs aspect-square rounded-xl overflow-hidden shadow-xl border-4 border-[#A8F1D0]/30">
                    <img src="{{ asset('photos/' . $adoption->pet->image) }}" alt="Foto de {{ $adoption->pet->name }}"
                        class="object-cover w-full h-full transform hover:scale-105 transition duration-500" />
                </div>

                <div class="mt-6 p-4 bg-[#111827] rounded-xl w-full text-sm text-gray-300 border border-gray-700">
                    <p class="font-bold text-[#A8F1D0] mb-2">Descripción:</p>
                    <p>{{ $adoption->pet->description }}</p>
                </div>
            </div>

            {{-- COL 2: ADOPTANTE --}}
            <div class="lg:col-span-1 flex flex-col items-center">
                <h3 class="text-2xl font-bold text-[#5EC9A5] mb-4 border-b pb-2 border-gray-700/50 w-full text-center">
                    El Adoptante</h3>

                <div
                    class="relative w-36 h-36 rounded-full overflow-hidden shadow-xl border-4 border-[#5EC9A5]/30 mb-6">
                    <img src="{{ asset('photos/' . $adoption->user->photo) }}"
                        alt="Foto de {{ $adoption->user->fullname }}" class="object-cover w-full h-full" />
                </div>

                <div class="w-full space-y-3 text-white text-base p-4 bg-[#111827] rounded-xl border border-gray-700">
                    <p>
                        <span class="text-[#A8F1D0] font-semibold w-24 inline-block">Nombre:</span>
                        <span class="font-medium">{{ $adoption->user->fullname }}</span>
                    </p>
                    <p>
                        <span class="text-[#A8F1D0] font-semibold w-24 inline-block">Email:</span>
                        <span class="font-medium">{{ $adoption->user->email }}</span>
                    </p>
                    <p>
                        <span class="text-[#A8F1D0] font-semibold w-24 inline-block">Teléfono:</span>
                        <span class="font-medium">{{ $adoption->user->phone }}</span>
                    </p>
                </div>
            </div>

            {{-- COL 3: DATOS Y ESTADOS --}}
            <div class="lg:col-span-1 space-y-6">
                <h3 class="text-2xl font-bold text-white mb-4 border-b pb-2 border-gray-700/50 w-full text-center">
                    Datos Adicionales</h3>

                <div class="space-y-3 text-white text-base">
                    <p><span class="text-[#A8F1D0] font-semibold w-24 inline-block">Especie:</span>
                        {{ $adoption->pet->kind }}</p>
                    <p><span class="text-[#A8F1D0] font-semibold w-24 inline-block">Raza:</span>
                        {{ $adoption->pet->breed }}</p>
                    <p><span class="text-[#A8F1D0] font-semibold w-24 inline-block">Edad:</span>
                        {{ $adoption->pet->age }} años</p>
                    <p><span class="text-[#A8F1D0] font-semibold w-24 inline-block">Ubicación:</span>
                        {{ $adoption->pet->location }}</p>
                </div>

                {{-- ESTADO DE ADOPCIÓN --}}
                <div class="space-y-3 p-4 bg-[#111827] rounded-xl border border-gray-700">

                    <p>
                        <span class="text-[#A8F1D0] font-bold block mb-1">Estatus de Adopción:</span>
                        {!! $adoption->pet->status
                        ? '<span
                            class="inline-flex items-center px-3 py-1 text-sm font-semibold rounded-full bg-green-900/50 text-green-400 border border-green-700">✅
                            Adoptado</span>'
                        : '<span
                            class="inline-flex items-center px-3 py-1 text-sm font-semibold rounded-full bg-red-900/50 text-red-400 border border-red-700">❌
                            No Adoptado</span>' !!}
                    </p>

                    {{-- ESTADO DE PUBLICACIÓN --}}
                    <p>
                        <span class="text-[#A8F1D0] font-bold block mb-1">Estado de Publicación:</span>

                        @if($adoption->pet->status)
                        <span
                            class="inline-flex items-center px-3 py-1 text-sm font-semibold rounded-full bg-red-900/50 text-red-400 border border-red-700">
                            ❌ No Disponible
                        </span>
                        @else
                        <span
                            class="inline-flex items-center px-3 py-1 text-sm font-semibold rounded-full bg-green-900/50 text-green-400 border border-green-700">
                            👍 Disponible
                        </span>
                        @endif
                    </p>

                    <div class="pt-4 border-t border-gray-700/50 text-sm text-gray-400">
                        <p>
                            <span class="text-[#5EC9A5] font-semibold mr-2">Fecha de Adopción:</span>
                            {{ $adoption->created_at->format('d/m/Y H:i') }}
                        </p>
                        <p>
                            <span class="text-[#5EC9A5] font-semibold mr-2">Última Actualización (Mascota):</span>
                            {{ $adoption->pet->updated_at->format('d/m/Y H:i') }}
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</header>

@endsection