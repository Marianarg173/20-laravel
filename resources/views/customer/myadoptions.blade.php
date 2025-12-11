@extends('layouts.dashboard')

@section('title', 'Mis Adopciones: Larapets 🏡')

@section('content')

{{-- Contenedor principal --}}
<div class="container mx-auto px-4 py-8">
    
    {{-- Mensaje de éxito estilizado --}}
    @if(session('message'))
    <div class="p-4 mb-6 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800 text-center font-semibold max-w-2xl mx-auto shadow-md" role="alert">
        {{ session('message') }}
    </div>
    @endif

    {{-- Título y Encabezado Mejorado --}}
    <h1 class="text-4xl font-extrabold text-teal-600 flex items-center gap-3 justify-center pb-6 mb-12 border-b-2 border-teal-100">
        <span class="p-3 bg-teal-100 rounded-full shadow-lg flex items-center justify-center text-teal-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 256 256">
                <path d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z"></path>
            </svg>
        </span>
        <span class="tracking-wide text-center">Mis Adopciones</span>
    </h1>

    {{-- Contenedor de las Tarjetas de Adopción --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @forelse ($adoptions as $adoption)

        {{-- INICIO DE LA TARJETA DE ADOPCIÓN --}}
        <div class="bg-white rounded-xl shadow-2xl p-6 border-t-8 border-teal-500 hover:shadow-3xl transition-all duration-300 transform hover:scale-[1.02]">

            {{-- Cabecera con Fechas --}}
            <p class="text-sm text-gray-500 text-right mb-4 border-b pb-2">
                Solicitada: <span class="font-semibold text-gray-700">{{ $adoption->created_at->format('d M Y') }}</span>
                <br>
                <span class="text-xs italic">({{ $adoption->created_at->diffForHumans() }})</span>
            </p>

            {{-- Fotos del Proceso (Diseño de Intersección) --}}
            <div class="flex justify-center items-center gap-2 mb-6">
                
                {{-- Foto del Adoptante --}}
                <div class="avatar relative -mr-4 z-10">
                    <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-white shadow-lg ring-2 ring-blue-400">
                        <img src="{{ asset('photos/'.$adoption->user->photo) }}" alt="Foto del Adoptante" class="object-cover w-full h-full" />
                    </div>
                </div>
                
                {{-- Icono central de Corazón (Unión) --}}
                <div class="p-2 bg-pink-100 rounded-full shadow-lg z-20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-pink-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                    </svg>
                </div>
                
                {{-- Foto de la Mascota --}}
                <div class="avatar relative -ml-4 z-10">
                    <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-white shadow-lg ring-2 ring-teal-400">
                        <img src="{{ asset('photos/'.$adoption->pet->image) }}" alt="Foto de la Mascota" class="object-cover w-full h-full" />
                    </div>
                </div>
            </div>

            {{-- Información Central --}}
            <div class="text-center">
                <p class="text-xl font-bold text-gray-800">
                    {{ $adoption->pet->name }} ({{ $adoption->pet->kind }})
                </p>
                <p class="text-sm text-gray-600 mt-1">
                    Adoptado por: <span class="font-semibold text-blue-600">{{ $adoption->user->fullname }}</span>
                </p>
            </div>
            
            {{-- Botón de Acción --}}
            <div class="mt-6 flex justify-center">
                <a href="{{ url('myadoptions/'.$adoption->id) }}"
                    class="btn bg-teal-500 text-white border-teal-500 hover:bg-teal-600 hover:border-teal-600 
                           px-6 py-2 rounded-full font-semibold shadow-md transition-all duration-300 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    Ver Detalles
                </a>
            </div>

        </div>
        {{-- FIN DE LA TARJETA DE ADOPCIÓN --}}

        @empty
        <div class="md:col-span-3 text-center py-10">
            <p class="text-2xl text-gray-500 font-medium">
                ¡Aún no hay adopciones registradas! 😔
            </p>
            <p class="text-gray-400 mt-2">Cuando una mascota sea adoptada, aparecerá aquí.</p>
        </div>
        @endforelse

    </div> {{-- Fin del Contenedor de las Tarjetas --}}
</div>

@endsection

@section('js')
{{-- No se necesita JS adicional para este diseño --}}
@endsection