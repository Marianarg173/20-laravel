@extends('layouts.dashboard')

@section('title', 'Make Adoption: Larapets 🐶')

@section('content')

{{-- Mensaje de éxito --}}
@if(session('message'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-center">
    {{ session('message') }}
</div>
@endif

{{-- Título --}}
<h1 class="text-3xl md:text-4xl font-extrabold text-[#5EC9A5] flex items-center gap-3 justify-center pb-6 mb-10">
    <span class="p-3 bg-[#A8F1D0] rounded-2xl shadow-sm flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="" viewBox="0 0 256 256">
            <path
                d="M230.33,141.06a24.34,24.34,0,0,0-18.61-4.77C230.5,117.33,240,98.48,240,80c0-26.47-21.29-48-47.46-48A47.58,47.58,0,0,0,156,48.75,47.58,47.58,0,0,0,119.46,32C93.29,32,72,53.53,72,80c0,11,3.24,21.69,10.06,33a31.87,31.87,0,0,0-14.75,8.4L44.69,144H16A16,16,0,0,0,0,160v40a16,16,0,0,0,16,16H120a7.93,7.93,0,0,0,1.94-.24l64-16a6.94,6.94,0,0,0,1.19-.4L226,182.82l.44-.2a24.6,24.6,0,0,0,3.93-41.56ZM119.46,48A31.15,31.15,0,0,1,148.6,67a8,8,0,0,0,14.8,0,31.15,31.15,0,0,1,29.14-19C209.59,48,224,62.65,224,80c0,19.51-15.79,41.58-45.66,63.9l-11.09,2.55A28,28,0,0,0,140,112H100.68C92.05,100.36,88,90.12,88,80,88,62.65,102.41,48,119.46,48ZM16,160H40v40H16Zm203.43,8.21-38,16.18L119,200H56V155.31l22.63-22.62A15.86,15.86,0,0,1,89.94,128H140a12,12,0,0,1,0,24H112a8,8,0,0,0,0,16h32a8.32,8.32,0,0,0,1.79-.2l67-15.41.31-.08a8.6,8.6,0,0,1,6.3,15.9Z">
            </path>
        </svg>
    </span>
    <span class="tracking-wide text-center">Make Adoption</span>
</h1>

{{-- Search --}}
<label
    class="input text-gray-700 bg-white border border-[#A8F1D0] shadow-sm rounded-xl mb-10 w-full max-w-md mx-auto flex items-center gap-2">
    <svg class="h-[1em] opacity-60 text-[#5EC9A5]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.3-4.3"></path>
        </g>
    </svg>
    <input id="qsearch" type="search" placeholder="Search..." name="qsearch" class="text-gray-700 w-full" />
</label>

{{-- Tabla --}}
<div class="overflow-x-auto rounded-3xl border border-[#A8F1D0] bg-[#F5F7F8] shadow-xl p-3 md:p-4">

    <table class="table w-full">
        <thead>
            <tr class="bg-[#A8F1D0] text-[#2E6F56] text-xs md:text-sm uppercase tracking-wide">
                <th class="hidden md:table-cell">Id</th>
                <th class="py-3">Photo</th>
                <th class="py-3">Name</th>
                <th class="py-3">Kind</th>
                <th class="hidden md:table-cell">Age</th>
                <th class="hidden md:table-cell">Breed</th>
                <th class="hidden md:table-cell">Active</th>
                <th class="py-3">Status</th>
                <th class="py-3 text-center">Actions</th>
            </tr>
        </thead>

        <tbody class="text-gray-700 text-sm md:text-base datalist">

            @foreach($pets as $pet)
            <tr class="border-b border-[#A8F1D080] hover:bg-[#A8F1D040] transition">

                <td class="hidden md:table-cell">{{ $pet->id }}</td>

                {{-- FOTO --}}
                <td class="py-2 whitespace-nowrap">
                    <div class="avatar">
                        <div class="w-14 md:w-16 rounded-full bg-gray-200 overflow-hidden">
                            <img src="{{ asset('photos/'.$pet->image) }}" loading="lazy" width="64" height="64"
                                class="object-cover w-full h-full transition-opacity duration-300" />
                        </div>
                    </div>
                </td>

                {{-- NAME --}}
                <td class="py-3 font-medium text-[#2E6F56] whitespace-nowrap">{{ $pet->name }}</td>

                {{-- KIND --}}
                <td class="py-3">{{ $pet->kind }}</td>

                {{-- AGE --}}
                <td class="hidden md:table-cell">{{ $pet->age }}</td>

                {{-- BREED --}}
                <td class="hidden md:table-cell">{{ $pet->breed }}</td>

                {{-- ACTIVE --}}
                <td class="hidden md:table-cell">
                    @if ($pet->active == 1)
                    <span class="badge bg-[#5EC9A5] text-white">Active</span>
                    @else
                    <span class="badge bg-red-300 text-red-700">Inactive</span>
                    @endif
                </td>

                {{-- STATUS --}}
                <td class="py-3">
                    @if ($pet->status == 1)
                    <span class="badge bg-[#5EC9A5] text-white">Adopted</span>
                    @else
                    <span class="badge bg-red-300 text-red-700">Not Adopted</span>
                    @endif
                </td>

                {{-- ACTIONS (SOLO LUPITA) --}}
                <td class="py-4 flex justify-center whitespace-nowrap">
                    <a href="{{ route('customer.pet.show', $pet->id) }}" class="text-[#5EC9A5] hover:text-[#2E6F56]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z">
                            </path>
                        </svg>
                    </a>
                </td>


            </tr>
            @endforeach

            <tr>
                <td colspan="9">
                    {{ $pets->links('layouts.pagination') }}
                </td>
            </tr>

        </tbody>
    </table>

</div>

@endsection

@section('js')
<script>
    $(document).ready(function (){

    // Search
    function debounce(func, wait) {
        let timeout
        return function(...args) {
            const later = () => { clearTimeout(timeout); func(...args) };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait)
        }
    }

    const search = debounce(function(query) {
        const token = $('input[name=_token]').val()
        $.post("search/makeadoption", {'q': query, '_token': token}, function (data) {
            $('.datalist').html(data).hide().fadeIn(1000)
        })
    }, 500)

    $('body').on('input', '#qsearch', function(event) {
        event.preventDefault()
        const query = $(this).val()
        $('.datalist').html(`<tr><td colspan="9" class="text-center py-18"><span class="loading loading-spinner loading-xl"></span></td></tr>`)
        if(query != ''){ search(query) }
        else{ setTimeout(() => { window.location.replace('makeadoption') }, 500); }
    });

})
</script>
@endsection