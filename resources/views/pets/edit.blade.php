@extends('layouts.dashboard')

@section('title', 'Edit Pet: Larapets 🐶')

@section('content')

{{-- Título --}}
<h1 class="text-3xl md:text-4xl font-extrabold text-[#5EC9A5] flex items-center gap-3 justify-center pb-6 mb-10">
    <span class="p-3 bg-[#A8F1D0] rounded-2xl shadow-sm flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" class="md:w-[34px] md:h-[34px]"
            fill="currentColor" viewBox="0 0 256 256">
            <path
                d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0-22.63-22.63ZM92.69,208H48V163.31l88-88L180.69,120Z">
            </path>
        </svg>
    </span>
    Edit Pet
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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 stroke-current" fill="currentColor"
                    viewBox="0 0 256 256">
                    <path
                        d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0-22.63-22.63ZM92.69,208H48V163.31l88-88L180.69,120Z">
                    </path>
                </svg>
                Edit Pet: {{ $pet->name ?? 'N/A' }}
            </span>
        </li>
    </ul>
</div>

{{-- Formulario --}}
<form method="POST" action="{{ url('pets/' . $pet->id) }}" class="w-full max-w-xl mx-auto"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Foto --}}
    <div class="flex justify-center mb-6">
        <div
            class="avatar w-32 flex flex-col items-center cursor-pointer hover:scale-110 transition ease-in-out duration-300">
            <div id="upload" class="mask mask-squircle w-full">
                <img id="preview" src="{{ asset('photos/'.$pet->image) }}" class="w-full h-auto object-cover" />
            </div>
            <small class="mt-2 text-center text-gray-600 flex gap-1 items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256">
                    <path
                        d="M168,136a8,8,0,0,1-8,8H136v24a8,8,0,0,1-16,0V144H96a8,8,0,0,1,0-16h24V104a8,8,0,0,1,16,0v24h24A8,8,0,0,1,168,136Zm64-56V192a24,24,0,0,1-24,24H48a24,24,0,0,1-24-24V80A24,24,0,0,1,48,56H75.72L87,39.12A16,16,0,0,1,100.28,32h55.44A16,16,0,0,1,169,39.12L180.28,56H208A24,24,0,0,1,232,80Zm-16,0a8,8,0,0,0-8-8H176a8,8,0,0,1-6.66-3.56L155.72,48H100.28L86.66,68.44A8,8,0,0,1,80,72H48a8,8,0,0,0-8,8V192a8,8,0,0,0,8,8H208a8,8,0,0,0,8-8Z">
                    </path>
                </svg>
                Upload Photo
            </small>
            @error('image')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <input type="file" id="photo" name="image" class="hidden" accept="image/*">
    <input type="hidden" name="origin_image" value="{{ $pet->image }}">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">

        {{-- Name --}}
        <div class="col-span-1 md:col-span-2">
            <label class="label text-gray-700 font-medium text-sm">Name</label>
            <input type="text" name="name" class="input input-bordered w-full rounded-lg text-sm" placeholder="Buddy"
                value="{{ old('name', $pet->name) }}" />
            @error('name')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- Kind --}}
        <div class="col-span-1">
            <label class="label text-gray-700 font-medium text-sm">Kind</label>
            <input type="text" name="kind" class="input input-bordered w-full rounded-lg text-sm"
                placeholder="Dog, Cat, Bird, etc." value="{{ old('kind', $pet->kind) }}" />
            @error('kind')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- Weight --}}
        <div class="col-span-1">
            <label class="label text-gray-700 font-medium text-sm">Weight (kg)</label>
            <input type="number" step="0.1" name="weight" class="input input-bordered w-full rounded-lg text-sm"
                placeholder="5.5" value="{{ old('weight', $pet->weight) }}" />
            @error('weight')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>


        {{-- Age --}}
        <div class="col-span-1">
            <label class="label text-gray-700 font-medium text-sm">Age (Years)</label>
            <input type="number" name="age" class="input input-bordered w-full rounded-lg text-sm" placeholder="2"
                value="{{ old('age', $pet->age) }}" />
            @error('age')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- Breed --}}
        <div class="col-span-1">
            <label class="label text-gray-700 font-medium text-sm">Breed</label>
            <input type="text" name="breed" class="input input-bordered w-full rounded-lg text-sm"
                placeholder="Golden Retriever" value="{{ old('breed', $pet->breed) }}" />
            @error('breed')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- Location --}}
        <div class="col-span-1">
            <label class="label text-gray-700 font-medium text-sm">Location</label>
            <input type="text" name="location" class="input input-bordered w-full rounded-lg text-sm"
                placeholder="Manizales, Colombia" value="{{ old('location', $pet->location) }}" />
            @error('location')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- Active --}}
        <div class="col-span-1">
            <label class="label text-gray-700 font-medium text-sm">Active</label>
            <select name="active" class="select select-bordered w-full rounded-lg text-sm">
                <option value="1" {{ old('active', $pet->active) == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('active', $pet->active) == 0 ? 'selected' : '' }}>No</option>
            </select>
            @error('active')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- Status --}}
        <div class="col-span-1">
            <label class="label text-gray-700 font-medium text-sm">Status</label>
            <select name="status" class="select select-bordered w-full rounded-lg text-sm">
                <option value="1" {{ old('status', $pet->status) == 1 ? 'selected' : '' }}>Adopted</option>
                <option value="0" {{ old('status', $pet->status) == 0 ? 'selected' : '' }}>Not Adopted</option>
            </select>
            @error('status')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

    </div>

    {{-- Description --}}
    <div class="col-span-1 md:col-span-2">
        <label class="label text-gray-700 font-medium text-sm">Description</label>
        <textarea name="description" class="textarea textarea-bordered w-full rounded-lg text-sm"
            placeholder="Friendly and energetic.">{{ old('description', $pet->description) }}</textarea>
        @error('description')
        <small class="badge badge-error mt-1">{{ $message }}</small>
        @enderror
    </div>


    {{-- Botón --}}
    <div class="flex justify-center mt-6">
        <button type="submit"
            class="btn btn-outline btn-info px-6 py-1 text-sm font-semibold rounded-lg shadow-sm hover:bg-amber-500 hover:text-white transition-all duration-200">
            Save Changes
        </button>
    </div>

</form>

@endsection

@section('js')
<script>
    $(document).ready(function(){
    $('#upload').click(function (e) {
        e.preventDefault();
        $('#photo').click();
    });
    $('#photo').change(function (e) {
        e.preventDefault();
        $('#preview').attr('src', window.URL.createObjectURL($(this).prop('files')[0]));
    });
});
</script>
@endsection