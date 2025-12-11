@extends('layouts.dashboard')

@section('title', 'Add Pet: Larapets 🐶')

@section('content')

{{-- Título --}}
<h1 class="text-3xl md:text-4xl font-extrabold text-[#5EC9A5] flex items-center gap-3 justify-center pb-6 mb-10">
    <span class="p-3 bg-[#A8F1D0] rounded-2xl shadow-sm flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
            <path
                d="M212,80a28,28,0,1,0,28,28A28,28,0,0,0,212,80Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,212,120ZM72,108a28,28,0,1,0-28,28A28,28,0,0,0,72,108ZM44,120a12,12,0,1,1,12-12A12,12,0,0,1,44,120ZM92,88A28,28,0,1,0,64,60,28,28,0,0,0,92,88Zm0-40A12,12,0,1,1,80,60,12,12,0,0,1,92,48Zm72,40a28,28,0,1,0-28-28A28,28,0,0,0,164,88Zm0-40a12,12,0,1,1-12,12A12,12,0,0,1,164,48Zm23.12,100.86a35.3,35.3,0,0,1-16.87-21.14,44,44,0,0,0-84.5,0A35.25,35.25,0,0,1,69,148.82,40,40,0,0,0,88,224a39.48,39.48,0,0,0,15.52-3.13,64.09,64.09,0,0,1,48.87,0,40,40,0,0,0,34.73-72ZM168,208a24,24,0,0,1-9.45-1.93,80.14,80.14,0,0,0-61.19,0,24,24,0,0,1-20.71-43.26,51.22,51.22,0,0,0,24.46-30.67,28,28,0,0,1,53.78,0,51.27,51.27,0,0,0,24.53,30.71A24,24,0,0,1,168,208Z">
            </path>
        </svg>
    </span>
    Add Pet
</h1>

{{-- Breadcrumbs --}}
<div class="breadcrumbs text-sm text-gray-700 dark:text-black mb-6">
    <ul>
        <li>
            <a href="{{ url('dashboard') }}" class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ url('pets') }}" class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                Pet Module
            </a>
        </li>
        <li>
            <span class="inline-flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                Add Pet
            </span>
        </li>
    </ul>
</div>

{{-- Formulario --}}
<form method="POST" action="{{ url('pets') }}" class="w-full max-w-xl mx-auto" enctype="multipart/form-data">
    @csrf

    {{-- Foto centrada en la parte superior (Image) --}}
    <div class="flex justify-center mb-6">
        <div
            class="avatar w-32 flex flex-col items-center cursor-pointer hover:scale-110 transition ease-in-out duration-300">
            <div id="upload" class="mask mask-squircle w-full">
                <img id="preview" src="{{ asset('photos/no-pets.png') }}" class="w-full h-auto object-cover" />
            </div>
            <small class=" mt-2 text-center text-gray-600 flex gap-1 items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                    <path
                        d="M212,80a28,28,0,1,0,28,28A28,28,0,0,0,212,80Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,212,120ZM72,108a28,28,0,1,0-28,28A28,28,0,0,0,72,108ZM44,120a12,12,0,1,1,12-12A12,12,0,0,1,44,120ZM92,88A28,28,0,1,0,64,60,28,28,0,0,0,92,88Zm0-40A12,12,0,1,1,80,60,12,12,0,0,1,92,48Zm72,40a28,28,0,1,0-28-28A28,28,0,0,0,164,88Zm0-40a12,12,0,1,1-12,12A12,12,0,0,1,164,48Zm23.12,100.86a35.3,35.3,0,0,1-16.87-21.14,44,44,0,0,0-84.5,0A35.25,35.25,0,0,1,69,148.82,40,40,0,0,0,88,224a39.48,39.48,0,0,0,15.52-3.13,64.09,64.09,0,0,1,48.87,0,40,40,0,0,0,34.73-72ZM168,208a24,24,0,0,1-9.45-1.93,80.14,80.14,0,0,0-61.19,0,24,24,0,0,1-20.71-43.26,51.22,51.22,0,0,0,24.46-30.67,28,28,0,0,1,53.78,0,51.27,51.27,0,0,0,24.53,30.71A24,24,0,0,1,168,208Z">
                    </path>
                </svg>
                Upload Photo
            </small>
            @error('photo')
            <small class="badge badge-error mt 4">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <input type="file" id="photo" name="image" class="hidden" accept="image/*">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">

        {{-- Name --}}
        <div class="col-span-1">
            <label class="label text-gray-700 font-medium text-sm">Name</label>
            <input type="text" name="name"
                class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                placeholder="Buddy" value="{{ old('name') }}" />
            @error('name')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- Kind (Tipo) - Ahora como campo de texto simple --}}
        <div class="col-span-1">
            <label class="label text-gray-700 font-medium text-sm">Kind</label>
            <input type="text" name="kind"
                class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                placeholder="Dog, Cat, Bird, etc." value="{{ old('kind') }}" />
            @error('kind')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- Weight (Peso) --}}
        <div class="col-span-1">
            <label class="label text-gray-700 font-medium text-sm">Weight (kg)</label>
            <input type="number" step="0.1" name="weight"
                class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                placeholder="5.5" value="{{ old('weight') }}" />
            @error('weight')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- Age (Edad) --}}
        <div class="col-span-1">
            <label class="label text-gray-700 font-medium text-sm">Age (Years)</label>
            <input type="number" name="age"
                class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                placeholder="2" value="{{ old('age') }}" />
            @error('age')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- Breed (Raza) --}}
        <div class="col-span-1">
            <label class="label text-gray-700 font-medium text-sm">Breed</label>
            <input type="text" name="breed"
                class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                placeholder="Golden Retriever" value="{{ old('breed') }}" />
            @error('breed')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- Location (Ubicación) --}}
        <div class="col-span-1">
            <label class="label text-gray-700 font-medium text-sm">Location</label>
            <input type="text" name="location"
                class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                placeholder="Manizales, Colombia" value="{{ old('location') }}" />
            @error('location')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- Description (Descripción) - Campo de texto completo --}}
        <div class="col-span-1 md:col-span-2">
            <label class="label text-gray-700 font-medium text-sm">Description</label>
            <textarea name="description"
                class="textarea textarea-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                placeholder="Friendly, energetic, and loves long walks. Needs a home with a yard.">{{ old('description') }}</textarea>
            @error('description')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

    </div>

    {{-- Botón centrado --}}
    <div class="flex justify-center mt-6">
        <button type="submit"
            class="btn btn-outline btn-info px-6 py-1 text-sm font-semibold rounded-lg shadow-sm hover:bg-amber-500 hover:text-white transition-all duration-200">
            Add
        </button>
    </div>

</form>

@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#upload'). click(function (e) {
            e.preventDefault();
            $('#photo').click();
        })
        $('#photo').change(function (e) {
            e.preventDefault();
            $('#preview').attr('src', window.URL.createObjectURL($(this).prop('files')[0]));
        })
    })
</script>
@endsection