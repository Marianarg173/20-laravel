@extends('layouts.dashboard')

@section('title', 'Detalles de Adopción | Larapets 🐶')

@section('content')

{{-- Contenedor principal para centrar y añadir padding --}}
<div class="container mx-auto px-4 py-12">

    {{-- Encabezado con Título y Breadcrumbs --}}
    <header class="mb-12 text-center">
        <h1
            class="text-5xl font-extrabold text-[#A8F1D0] inline-flex items-center gap-4 pb-6 tracking-tight drop-shadow-lg">
            <span class="p-3 bg-[#5EC9A5] rounded-full text-gray-900 shadow-xl">
                {{-- Icono de Corazón --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 256 256">
                    <path fill="currentColor"
                        d="M223,57a58.07,58.07,0,0,0-81.92-.1L128,69.05,114.91,56.86A58,58,0,0,0,33,139l89.35,90.66a8,8,0,0,0,11.4,0L223,139a58,58,0,0,0,0-82Zm-11.35,70.76L128,212.6,44.3,127.68a42,42,0,0,1,59.4-59.4l.2.2,18.65,17.35a8,8,0,0,0,10.9,0L152.1,68.48l.2-.2a42,42,0,1,1,59.36,59.44Z">
                    </path>
                </svg>
            </span>
            Detalles de la Adopción
        </h1>

        {{-- Breadcrumbs (Más sutiles) --}}
        <div class="breadcrumbs text-sm text-gray-500 flex justify-center mt-2">
            <ul>
                <li>
                    <a href="{{ url('dashboard') }}" class="flex items-center gap-1 hover:text-[#A8F1D0] transition">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ url('myadoptions') }}" class="flex items-center gap-1 hover:text-[#A8F1D0] transition">
                        Mis Adopciones
                    </a>
                </li>
                <li>
                    <span class="text-[#5EC9A5] font-semibold">Detalle #{{ $adoption->id }}</span>
                </li>
            </ul>
        </div>
    </header>

    {{-- Contenedor Principal: Efecto Tarjeta Elevada --}}
    <div
        class="bg-gray-900/90 p-8 md:p-14 rounded-3xl shadow-3xl max-w-6xl mx-auto border-t-8 border-[#5EC9A5] transition duration-500 hover:shadow-[0_0_50px_rgba(94,201,165,0.3)]">

        {{-- Grid de 3 Columnas --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-16">

            {{-- COL 1: MASCOTA --}}
            <div class="lg:col-span-1 flex flex-col items-center text-center">
                <h3
                    class="text-2xl font-extrabold text-[#A8F1D0] mb-6 border-b-2 border-dashed pb-3 border-gray-700 w-full">
                    🐾 Mascota ({{ $adoption->pet->kind }})
                </h3>

                <div
                    class="relative w-full max-w-xs aspect-square rounded-[2rem] overflow-hidden shadow-2xl border-6 border-[#A8F1D0]/80 transform hover:scale-[1.03] transition duration-500 hover:shadow-[0_0_30px_rgba(168,241,208,0.5)]">
                    <img src="{{ asset('photos/' . $adoption->pet->image) }}" alt="Foto de {{ $adoption->pet->name }}"
                        class="object-cover w-full h-full" />
                </div>

                {{-- Descripción más destacada --}}
                <div
                    class="mt-8 p-5 bg-gradient-to-br from-[#1F2937] to-gray-800 rounded-3xl w-full text-sm text-gray-300 border border-gray-700 shadow-xl">
                    <p class="font-bold text-[#5EC9A5] mb-2 border-b-2 border-dotted pb-1">📃 Historia de {{
                        $adoption->pet->name }}:</p>
                    <p class="text-gray-400 italic leading-relaxed text-left">{{ $adoption->pet->description }}</p>
                </div>
            </div>

            {{-- COL 2: ADOPTANTE --}}
            <div class="lg:col-span-1 flex flex-col items-center text-center">
                <h3
                    class="text-2xl font-extrabold text-[#5EC9A5] mb-6 border-b-2 border-dashed pb-3 border-gray-700 w-full">
                    🏠 El Adoptante
                </h3>

                <div
                    class="relative w-40 h-40 rounded-full overflow-hidden shadow-2xl border-6 border-[#5EC9A5] mb-8 transform hover:scale-105 transition duration-300">
                    <img src="{{ asset('photos/' . $adoption->user->photo) }}"
                        alt="Foto de {{ $adoption->user->fullname }}" class="object-cover w-full h-full" />
                </div>

                <div class="w-full space-y-4 text-white text-base">
                    {{-- Tarjetas de información para el Adoptante --}}
                    <div
                        class="bg-[#1F2937] p-4 rounded-xl flex justify-between items-center border border-gray-700 shadow-lg">
                        <span class="text-[#A8F1D0] font-semibold">👤 Nombre:</span>
                        <span class="font-medium text-gray-200 text-right">{{ $adoption->user->fullname }}</span>
                    </div>
                    <div
                        class="bg-[#1F2937] p-4 rounded-xl flex justify-between items-center border border-gray-700 shadow-lg">
                        <span class="text-[#A8F1D0] font-semibold">📧 Email:</span>
                        <a href="mailto:{{ $adoption->user->email }}"
                            class="font-medium text-[#A8F1D0] hover:underline text-right">{{ $adoption->user->email
                            }}</a>
                    </div>
                    <div
                        class="bg-[#1F2937] p-4 rounded-xl flex justify-between items-center border border-gray-700 shadow-lg">
                        <span class="text-[#A8F1D0] font-semibold">📞 Teléfono:</span>
                        <a href="tel:{{ $adoption->user->phone }}"
                            class="font-medium text-[#A8F1D0] hover:underline text-right">{{ $adoption->user->phone
                            }}</a>
                    </div>
                </div>
            </div>

            {{-- COL 3: DATOS Y ESTADOS --}}
            <div class="lg:col-span-1 space-y-8">

                {{-- Bloque de Datos de la Mascota --}}
                <div
                    class="bg-gradient-to-br from-[#1F2937] to-gray-800 p-6 rounded-2xl shadow-xl border border-gray-700">
                    <h3
                        class="text-xl font-extrabold text-gray-200 mb-4 border-b-2 border-dashed pb-2 border-gray-700 text-center">
                        📋 Detalles Rápidos</h3>
                    <div class="space-y-3 text-gray-300 text-base">
                        <p class="flex justify-between">
                            <span class="text-[#A8F1D0] font-semibold">Especie:</span>
                            <span>{{ $adoption->pet->kind }}</span>
                        </p>
                        <p class="flex justify-between">
                            <span class="text-[#A8F1D0] font-semibold">Raza:</span>
                            <span>{{ $adoption->pet->breed }}</span>
                        </p>
                        <p class="flex justify-between">
                            <span class="text-[#A8F1D0] font-semibold">Edad:</span>
                            <span>{{ $adoption->pet->age }} años</span>
                        </p>
                        <p class="flex justify-between">
                            <span class="text-[#A8F1D0] font-semibold">Ubicación:</span>
                            <span>{{ $adoption->pet->location }}</span>
                        </p>
                    </div>
                </div>

                {{-- Bloque de Estatus y Fechas --}}
                <div
                    class="bg-gradient-to-br from-[#1F2937] to-gray-800 p-6 rounded-2xl shadow-xl border border-gray-700">
                    <h3
                        class="text-xl font-extrabold text-gray-200 mb-4 border-b-2 border-dashed pb-2 border-gray-700 text-center">
                        ⏰ Estatus & Tiempos</h3>

                    <div class="space-y-4">

                        {{-- ESTATUS DE ADOPCIÓN --}}
                        <div class="text-center pt-2">
                            <span class="text-[#A8F1D0] font-bold block mb-2">Estatus Final:</span>
                            {!! $adoption->pet->status
                            ? '<span
                                class="inline-flex items-center px-4 py-1.5 text-sm font-bold rounded-full bg-green-900/50 text-green-400 border-2 border-green-700 shadow-lg transform hover:scale-105 transition duration-200">
                                🥳 ADOPTADO
                            </span>'
                            : '<span
                                class="inline-flex items-center px-4 py-1.5 text-sm font-bold rounded-full bg-red-900/50 text-red-400 border-2 border-red-700 shadow-lg transform hover:scale-105 transition duration-200">
                                ❌ PENDIENTE
                            </span>'
                            !!}
                        </div>

                        {{-- ESTADO DE PUBLICACIÓN --}}
                        <div class="text-center">
                            <span class="text-[#A8F1D0] font-bold block mb-2">Disponibilidad Actual:</span>
                            @if($adoption->pet->status)
                            <span
                                class="inline-flex items-center px-4 py-1.5 text-sm font-bold rounded-full bg-red-900/50 text-red-400 border-2 border-red-700 shadow-lg transform hover:scale-105 transition duration-200">
                                🚫 NO DISPONIBLE
                            </span>
                            @else
                            <span
                                class="inline-flex items-center px-4 py-1.5 text-sm font-bold rounded-full bg-green-900/50 text-green-400 border-2 border-green-700 shadow-lg transform hover:scale-105 transition duration-200">
                                ✨ DISPONIBLE
                            </span>
                            @endif
                        </div>

                        {{-- Fechas (Más estilizadas) --}}
                        <div class="pt-4 border-t-2 border-dotted border-gray-700 text-sm text-gray-500 space-y-2">
                            <p class="flex justify-between">
                                <span class="text-gray-400 font-semibold">Fecha de Solicitud:</span>
                                <span class="text-white">{{ $adoption->created_at->format('d/m/Y H:i') }}</span>
                            </p>
                            <p class="flex justify-between">
                                <span class="text-gray-400 font-semibold">Última Revisión (Mascota):</span>
                                <span class="text-white">{{ $adoption->pet->updated_at->format('d/m/Y H:i') }}</span>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection