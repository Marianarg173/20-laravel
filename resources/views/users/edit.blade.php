@extends('layouts.dashboard')

@section('title', 'Edit User: Larapets')

@section('content')

<h1 class="text-3xl md:text-4xl font-extrabold text-[#5EC9A5] flex items-center gap-3 justify-center pb-6 mb-10">
    <span class="p-3 bg-[#A8F1D0] rounded-2xl shadow-sm flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
            <path
                d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120Z">
            </path>
        </svg>
    </span>
    Edit User
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
            <a href="{{ url('users') }}" class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                User Module
            </a>
        </li>
        <li>
            <span class="inline-flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 stroke-current" fill="currentColor"
                    viewBox="0 0 256 256">
                    <path
                        d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120Z">
                    </path>
                </svg>
                Edit User
            </span>
        </li>
    </ul>
</div>

{{-- Formulario --}}
<form method="POST" action="{{ url('users/'.$user->id) }}" class="w-full max-w-xl mx-auto"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Foto centrada en la parte superior --}}
    <div class="flex justify-center mb-6">
        <div
            class="avatar w-32 flex flex-col items-center cursor-pointer hover:scale-110 transition ease-in-out duration-300">
            <div id="upload" class="mask mask-squircle w-full">
                <img id="preview" src="{{ asset('photos/'.$user->photo) }}" class="w-full h-auto object-cover" />
            </div>
            <small class=" mt-2 text-center text-gray-600 flex gap-1 items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256">
                    <path
                        d="M168,136a8,8,0,0,1-8,8H136v24a8,8,0,0,1-16,0V144H96a8,8,0,0,1,0-16h24V104a8,8,0,0,1,16,0v24h24A8,8,0,0,1,168,136Zm64-56V192a24,24,0,0,1-24,24H48a24,24,0,0,1-24-24V80A24,24,0,0,1,48,56H75.72L87,39.12A16,16,0,0,1,100.28,32h55.44A16,16,0,0,1,169,39.12L180.28,56H208A24,24,0,0,1,232,80Zm-16,0a8,8,0,0,0-8-8H176a8,8,0,0,1-6.66-3.56L155.72,48H100.28L86.66,68.44A8,8,0,0,1,80,72H48a8,8,0,0,0-8,8V192a8,8,0,0,0,8,8H208a8,8,0,0,0,8-8Z">
                    </path>
                </svg>
                Upload Photo
            </small>
            @error('photo')
            <small class="badge badge-error mt 4">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <input type="file" id="photo" name="photo" class="hidden" accept="image/*">
    <input type="hidden" name="originphoto" value="{{ $user->photo }}">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
        {{-- Document --}}
        <div>
            <label class="label text-gray-700 font-medium text-sm">Document</label>
            <input type="text" name="document"
                class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                placeholder="75123123" value="{{ old('document', $user->document) }}" />
            @error('document')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>
        {{-- Full Name --}}
        <div>
            <label class="label text-gray-700 font-medium text-sm">Full Name</label>
            <input type="text" name="fullname"
                class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                placeholder="Jeremias Springfield" value="{{ old('fullname', $user->fullname) }}" />
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
                <option value="Female" @if(old('gender', $user->gender)=='Female' ) selected @endif>Female</option>
                <option value="Male" @if(old('gender', $user->gender)=='Male' ) selected @endif>Male</option>
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
                value="{{ old('birthdate', $user->birthdate) }}" />
            @error('birthdate')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- Phone --}}
        <div>
            <label class="label text-gray-700 font-medium text-sm">Phone</label>
            <input type="text" name="phone"
                class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                placeholder="3108326537" value="{{ old('phone', $user->phone) }}" />
            @error('phone')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label class="label text-gray-700 font-medium text-sm">Email</label>
            <input type="email" name="email"
                class="input input-bordered w-full rounded-lg text-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                placeholder="example@email.com" value="{{ old('email', $user->email) }}" />
            @error('email')
            <small class="badge badge-error mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- Botón centrado --}}
        <div class="flex justify-center mt-6">
            <button
                class="btn btn-outline btn-info px-6 py-1 text-sm font-semibold rounded-lg shadow-sm hover:bg-amber-500 hover:text-white transition-all duration-200">
                Edit
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