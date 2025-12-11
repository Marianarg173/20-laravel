@extends('layouts.dashboard')

@section('title', 'Show Pet: Larapets 🐶')

@section('content')

<h1 class="text-3xl md:text-4xl font-extrabold text-[#5EC9A5] flex items-center gap-3 justify-center pb-6 mb-10">
    <span class="p-3 bg-[#A8F1D0] rounded-2xl shadow-sm flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
            <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
        </svg>
    </span>
    Show Pet
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
                Show Pet
            </span>
        </li>
    </ul>
</div>

{{-- CARD DOS COLUMNAS --}}
<div class="bg-[#0006] p-10 rounded-xl shadow-xl max-w-3xl mx-auto">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

        {{-- FOTO CENTRADA --}}
        <div class="flex justify-center items-center">
            <div class="avatar">
                <div class="mask mask-squircle w-60 h-60">
                    <img src="{{ asset('photos/' . $pet->image) }}" class="object-cover w-full h-full"/>
                </div>
            </div>
        </div>

        {{-- DATOS DE LA MASCOTA --}}
        <ul class="space-y-3 text-white text-sm">
            <li><span class="text-[#fff9] font-bold">Name:</span> {{ $pet->name }}</li>
            <li><span class="text-[#fff9] font-bold">Kind:</span> {{ $pet->kind }}</li>
            <li><span class="text-[#fff9] font-bold">Age:</span> {{ $pet->age }} años</li>
            <li><span class="text-[#fff9] font-bold">Breed:</span> {{ $pet->breed }}</li>
            <li><span class="text-[#fff9] font-bold">Location:</span> {{ $pet->location }}</li>
            <li><span class="text-[#fff9] font-bold">Description:</span> {{ $pet->description }}</li>

            <li>
                <span class="text-[#fff9] font-bold">Active:</span>
                {!! $pet->active
                ? '<span class="text-green-400 font-bold">Activated</span>'
                : '<span class="text-red-400 font-bold">Inactive</span>' !!}
            </li>

            <li>
                <span class="text-[#fff9] font-bold">Status:</span>
                {!! $pet->status
                ? '<span class="text-green-400 font-bold">Adopted</span>'
                : '<span class="text-red-400 font-bold">Not Adopted</span>' !!}
            </li>

            <li><span class="text-[#fff9] font-bold">Created at:</span> {{ $pet->created_at }}</li>
            <li><span class="text-[#fff9] font-bold">Updated at:</span> {{ $pet->updated_at }}</li>
        </ul>

    </div>

</div>

@endsection
