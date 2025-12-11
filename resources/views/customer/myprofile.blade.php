@extends('layouts.dashboard')

@section('title', 'Mi Perfil | Larapets')

@section('content')

<div class="container mx-auto px-4 py-10">

    {{-- Título Principal Centrado y Profesional Amigable --}}
    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800 flex items-center gap-3 justify-center mb-6 border-b-2 border-[#5EC9A5]/50 pb-2">
        <span class="p-3 bg-[#5EC9A5] rounded-lg text-white shadow-md flex items-center justify-center">
            {{-- Icono de Usuario Estándar --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="size-7" fill="currentColor" viewBox="0 0 256 256">
                <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120Zm97.76,66.41a79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75,88,88,0,1,1,131.52,0Z"></path>
            </svg>
        </span>
        Configuración de Mi Perfil
    </h1>
    <p class="text-center text-gray-600 mb-8">Actualiza tu información personal a continuación.</p>

    {{-- Breadcrumbs (Más formal) --}}
    <div class="text-xs text-gray-500 mb-8 max-w-xl mx-auto">
        <ul class="flex space-x-2 justify-center font-medium">
            <li>
                <a href="{{ url('dashboard') }}" class="flex items-center gap-1 text-gray-500 hover:text-[#5EC9A5] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-3 w-3 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v9a2 2 0 002 2h10a2 2 0 002-2v-9"></path>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>/</li>
            <li class="font-semibold text-gray-700">Mi Perfil</li>
        </ul>
    </div>

    {{-- Contenedor del Formulario (Tarjeta Limpia) --}}
    <div class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-lg border-t-4 border-[#5EC9A5]">

        {{-- Formulario --}}
        <form method="POST" action="{{ url('myprofile/'.$user->id) }}" class="w-full" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- FOTO Y CAMBIO (Más discreto) --}}
            <div class="flex justify-center mb-8">
                <div
                    class="avatar w-28 flex flex-col items-center cursor-pointer hover:opacity-80 transition duration-200 relative group"
                    id="upload">
                    
                    {{-- Imagen de Perfil --}}
                    <div class="mask mask-squircle w-full rounded-full border-3 border-gray-300 shadow-sm overflow-hidden">
                        <img id="preview" src="{{ asset('photos/'.$user->photo) }}" class="w-full h-28 object-cover" alt="Foto de Perfil" />
                    </div>

                    {{-- Overlay Discreto para subir foto --}}
                    <div class="absolute bottom-0 right-0 p-1 bg-[#5EC9A5] rounded-full border-2 border-white shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-white" viewBox="0 0 256 256" fill="currentColor">
                             <path d="M213.66,50.34l-32-32a8,8,0,0,0-11.32,0L32,178.75V224a8,8,0,0,0,8,8H85.25l130.31-130.31A8,8,0,0,0,213.66,50.34ZM80,208H48V175.75L152,71.75,184,103.75ZM197.75,90.34,165.66,58.25l15-15,32,32Z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <input type="file" id="photo" name="photo" class="hidden" accept="image/*">
            <input type="hidden" name="originphoto" value="{{ $user->photo }}">
            
            {{-- Mensaje de Error de Foto --}}
            @error('photo')
            <div class="text-center mb-4">
                <small class="text-red-600 font-semibold bg-red-100 p-1 rounded">{{ $message }}</small>
            </div>
            @enderror

            {{-- Grid de Campos --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 text-left">
                
                {{-- Document --}}
                <div class="col-span-1">
                    <label class="label text-gray-700 font-semibold text-sm">Documento de Identidad</label>
                    <input type="text" name="document"
                        class="input input-bordered w-full rounded-lg text-sm border-gray-300 focus:ring-2 focus:ring-[#5EC9A5] focus:border-[#5EC9A5] transition bg-white"
                        placeholder="Sin puntos ni comas" value="{{ old('document', $user->document) }}" />
                    @error('document')
                    <small class="text-red-600 mt-1 block text-xs">{{ $message }}</small>
                    @enderror
                </div>
                
                {{-- Full Name --}}
                <div class="col-span-1">
                    <label class="label text-gray-700 font-semibold text-sm">Nombre Completo</label>
                    <input type="text" name="fullname"
                        class="input input-bordered w-full rounded-lg text-sm border-gray-300 focus:ring-2 focus:ring-[#5EC9A5] focus:border-[#5EC9A5] transition bg-white"
                        placeholder="Nombre y Apellido(s)" value="{{ old('fullname', $user->fullname) }}" />
                    @error('fullname')
                    <small class="text-red-600 mt-1 block text-xs">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Gender --}}
                <div class="col-span-1">
                    <label class="label text-gray-700 font-semibold text-sm mb-1">Género</label>
                    <select name="gender"
                        class="select select-bordered w-full rounded-lg text-sm bg-white border-gray-300 focus:ring-2 focus:ring-[#5EC9A5] focus:border-[#5EC9A5] transition">
                        <option value="">Seleccione una opción</option>
                        <option value="Female" @if(old('gender', $user->gender)=='Female' ) selected @endif>Femenino</option>
                        <option value="Male" @if(old('gender', $user->gender)=='Male' ) selected @endif>Masculino</option>
                        <option value="Other" @if(old('gender', $user->gender)=='Other' ) selected @endif>Otro</option>
                    </select>
                    @error('gender')
                    <small class="text-red-600 mt-1 block text-xs">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Birthdate --}}
                <div class="col-span-1">
                    <label class="label text-gray-700 font-semibold text-sm">Fecha de Nacimiento</label>
                    <input type="date" name="birthdate"
                        class="input input-bordered w-full rounded-lg text-sm border-gray-300 focus:ring-2 focus:ring-[#5EC9A5] focus:border-[#5EC9A5] transition bg-white"
                        value="{{ old('birthdate', $user->birthdate) }}" />
                    @error('birthdate')
                    <small class="text-red-600 mt-1 block text-xs">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Phone --}}
                <div class="col-span-1">
                    <label class="label text-gray-700 font-semibold text-sm">Teléfono de Contacto</label>
                    <input type="text" name="phone"
                        class="input input-bordered w-full rounded-lg text-sm border-gray-300 focus:ring-2 focus:ring-[#5EC9A5] focus:border-[#5EC9A5] transition bg-white"
                        placeholder="Ej. 3101234567" value="{{ old('phone', $user->phone) }}" />
                    @error('phone')
                    <small class="text-red-600 mt-1 block text-xs">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Email (NORMAL/EDITABLE) --}}
                <div class="col-span-1">
                    <label class="label text-gray-700 font-semibold text-sm">Correo Electrónico (Email)</label>
                    <input type="email" name="email"
                        class="input input-bordered w-full rounded-lg text-sm border-gray-300 focus:ring-2 focus:ring-[#5EC9A5] focus:border-[#5EC9A5] transition bg-white"
                        placeholder="ejemplo@correo.com" value="{{ old('email', $user->email) }}" />
                    @error('email')
                    <small class="text-red-600 mt-1 block text-xs">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Botón de Guardar (Centrado y Limpio) --}}
                <div class="md:col-span-2 flex justify-center mt-6">
                    <button type="submit"
                        class="bg-[#5EC9A5] text-white px-10 py-3 text-base font-semibold rounded-lg shadow-md transition duration-300 hover:bg-[#48b08f] hover:scale-[1.02]">
                        Guardar Cambios
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const uploadArea = document.getElementById('upload');
        const photoInput = document.getElementById('photo');
        const previewImage = document.getElementById('preview');

        // Abre el selector de archivos al hacer clic en el área de la foto
        uploadArea.addEventListener('click', function (e) {
            e.preventDefault();
            photoInput.click();
        });

        // Previsualiza la imagen seleccionada
        photoInput.addEventListener('change', function (e) {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    previewImage.src = event.target.result;
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>
@endsection