@extends('layouts.dashboard')

@section('title', '¡Adopta a un Amiguito! | Larapets 💖🐾')

@section('content')

{{-- Contenedor principal con padding --}}
<div class="container mx-auto px-4 py-10">

    {{-- Título Principal Centrado y Tierno (Más pequeño) --}}
    <header class="mb-8 text-center">
        <h1
            class="text-3xl lg:text-4xl font-extrabold text-[#5EC9A5] inline-flex items-center gap-2 pb-1 tracking-tight drop-shadow-sm">
            <span class="p-2 bg-[#A8F1D0] rounded-full text-gray-800 shadow-lg">
                {{-- Icono de Pata --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
                    <path
                        d="M212,80a28,28,0,1,0,28,28A28,28,0,0,0,212,80Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,212,120ZM72,108a28,28,0,1,0-28,28A28,28,0,0,0,72,108ZM44,120a12,12,0,1,1,12-12A12,12,0,0,1,44,120ZM92,88A28,28,0,1,0,64,60,28,28,0,0,0,92,88Zm0-40A12,12,0,1,1,80,60,12,12,0,0,1,92,48Zm72,40a28,28,0,1,0-28-28A28,28,0,0,0,164,88Zm0-40a12,12,0,1,1-12,12A12,12,0,0,1,164,48Zm23.12,100.86a35.3,35.3,0,0,1-16.87-21.14,44,44,0,0,0-84.5,0A35.25,35.25,0,0,1,69,148.82,40,40,0,0,0,88,224a39.48,39.48,0,0,0,15.52-3.13,64.09,64.09,0,0,1,48.87,0,40,40,0,0,0,34.73-72ZM168,208a24,24,0,0,1-9.45-1.93,80.14,80.14,0,0,0-61.19,0,24,24,0,0,1-20.71-43.26,51.22,51.22,0,0,0,24.46-30.67,28,28,0,0,1,53.78,0,51.27,51.27,0,0,0,24.53,30.71A24,24,0,0,1,168,208Z">
                    </path>
                </svg>
            </span>
            ¡Conoce a {{ $pet->name }}!
        </h1>
        <p class="text-gray-500 text-sm italic">¡Te está esperando para ser tu mejor amigo!</p>
    </header>


    {{-- Contenedor Principal: Tarjeta Súper Compacta (max-w-xl) y Clara --}}
    <div
        class="max-w-xl mx-auto bg-white p-5 rounded-[2rem] shadow-2xl overflow-hidden border-6 border-[#A8F1D0] transition duration-500 hover:shadow-[0_0_50px_rgba(94,201,165,0.3)]">

        {{-- SECCIÓN SUPERIOR: Foto y Nombre Centrados --}}
        <div class="text-center mb-5 border-b border-dashed border-gray-200 pb-5">

            {{-- Foto de la Mascota (Reducida) --}}
            <div class="md:flex-shrink-0 flex justify-center items-center mb-3">
                <img src="{{ asset('photos/'.$pet->image) }}" alt="Foto de {{ $pet->name }}"
                    class="h-48 w-48 object-cover rounded-full shadow-lg border-4 border-[#5EC9A5]/50 transform hover:scale-[1.05] transition duration-500"
                    style="aspect-ratio: 1 / 1;">
            </div>

            {{-- Nombre --}}
            <h2 class="block text-3xl leading-tight font-extrabold text-gray-900">
                {{ $pet->name }}
            </h2>

            {{-- Subtítulo Tierno --}}
            <div class="tracking-wider text-base text-[#5EC9A5] font-semibold mt-1">
                {{ $pet->kind }} | {{ $pet->breed }}
            </div>

        </div>

        {{-- DESCRIPCIÓN (Más compacta) --}}
        <div class="mb-6 p-4 bg-[#F0FAF8] rounded-xl border border-[#A8F1D0]">
            <span class="text-gray-800 font-bold flex items-center gap-2 mb-1 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#5EC9A5]" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path
                        d="M10 2a8 8 0 100 16 8 8 0 000-16zM6.5 9a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm4 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM10 14a3.5 3.5 0 00-3.5 3.5h7A3.5 3.5 0 0010 14z" />
                </svg>
                Un poco sobre mí:
            </span>
            <p class="text-gray-600 italic leading-snug text-xs">{{ $pet->description }}</p>
        </div>


        {{-- SECCIÓN INFERIOR: DETALLES Y ACCIÓN --}}
        <div class="pb-2">

            <h3 class="text-xl font-extrabold mb-4 text-gray-700 text-center">
                💖 Mis Detalles Rápidos
            </h3>

            {{-- Grid de Detalles (Tamaño XS) --}}
            <div class="grid grid-cols-3 gap-3 text-xs">

                {{-- Edad --}}
                <div class="p-2 text-center bg-[#E5F5EC] rounded-lg border border-[#A8F1D0] shadow-sm">
                    <span class="text-[#5EC9A5] font-bold block mb-1">🎂 Edad</span>
                    <span class="text-gray-800 font-semibold">{{ $pet->age }} años</span>
                </div>

                {{-- Peso --}}
                <div class="p-2 text-center bg-[#E5F5EC] rounded-lg border border-[#A8F1D0] shadow-sm">
                    <span class="text-[#5EC9A5] font-bold block mb-1">⚖️ Peso</span>
                    <span class="text-gray-800 font-semibold">{{ $pet->weight }} Kg</span>
                </div>

                {{-- Ubicación --}}
                <div class="p-2 text-center bg-[#E5F5EC] rounded-lg border border-[#A8F1D0] shadow-sm">
                    <span class="text-[#5EC9A5] font-bold block mb-1">📍 Ubicación</span>
                    <span class="text-gray-800 font-semibold">{{ $pet->location }}</span>
                </div>

            </div>

            {{-- ESTATUS Y BOTÓN DE ACCIÓN (Centrado) --}}
            <div class="mt-6 text-center">
                @if($pet->status == 1)
                <p class="text-lg font-bold p-2 bg-red-100 text-red-700 rounded-xl shadow-md border border-red-300">
                    🎉 ¡Ya tiene un hogar feliz!
                </p>
                @else
                {{-- Botón de Acción (Tierno y Compacto) --}}
                <form action="{{ route('customer.pet.adopt', $pet->id) }}" method="POST" class="inline-block">
                    @csrf
                    <button type="submit"
                        class="bg-[#5EC9A5] text-white px-8 py-3 text-xl font-black rounded-full shadow-lg transition duration-300 hover:bg-[#A8F1D0] hover:text-gray-800 hover:scale-105 transform border-3 border-[#A8F1D0]/50">
                        ¡ADÓPTAME AHORA! 💖
                    </button>
                </form>
                @endif
            </div>

        </div>

    </div>
</div>

@endsection