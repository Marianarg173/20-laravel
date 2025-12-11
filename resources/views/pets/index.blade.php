@extends('layouts.dashboard')

@section('title', 'Module Pets: Larapets 🐶')

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
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
            <path
                d="M212,80a28,28,0,1,0,28,28A28,28,0,0,0,212,80Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,212,120ZM72,108a28,28,0,1,0-28,28A28,28,0,0,0,72,108ZM44,120a12,12,0,1,1,12-12A12,12,0,0,1,44,120ZM92,88A28,28,0,1,0,64,60,28,28,0,0,0,92,88Zm0-40A12,12,0,1,1,80,60,12,12,0,0,1,92,48Zm72,40a28,28,0,1,0-28-28A28,28,0,0,0,164,88Zm0-40a12,12,0,1,1-12,12A12,12,0,0,1,164,48Zm23.12,100.86a35.3,35.3,0,0,1-16.87-21.14,44,44,0,0,0-84.5,0A35.25,35.25,0,0,1,69,148.82,40,40,0,0,0,88,224a39.48,39.48,0,0,0,15.52-3.13,64.09,64.09,0,0,1,48.87,0,40,40,0,0,0,34.73-72ZM168,208a24,24,0,0,1-9.45-1.93,80.14,80.14,0,0,0-61.19,0,24,24,0,0,1-20.71-43.26,51.22,51.22,0,0,0,24.46-30.67,28,28,0,0,1,53.78,0,51.27,51.27,0,0,0,24.53,30.71A24,24,0,0,1,168,208Z">
            </path>
        </svg>
    </span>
    <span class="tracking-wide text-center">Module Pets</span>
</h1>

{{-- Botones --}}
<div class="join mx-auto mb-6 flex flex-wrap gap-2 justify-center">

    <a class="btn join-item bg-[#A8F1D0] text-[#2E6F56] border-none hover:bg-[#5EC9A5]" href="{{ url('pets/create') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 md:size-6" fill="currentColor" viewBox="0 0 256 256">
            <path
                d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm48-88a8,8,0,0,1-8,8H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32A8,8,0,0,1,176,128Z">
            </path>
        </svg>
        <span class="hidden md:inline">Add Pet</span>
    </a>

    <a class="btn join-item bg-[#5EC9A5] text-white hover:bg-[#4CAF93]" href="{{ url('export/pets/pdf') }}">
        Export PDF
    </a>

    <a class="btn join-item bg-[#5EC9A5] text-white hover:bg-[#4CAF93]" href="{{ url('export/pets/excel') }}">
        Export Excel
    </a>

    <form class="join-item" action="{{ url('import/pets/excel') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="file" class="hidden" accept=".xlsx,.xls">
        <button type="button"
            class="btn bg-[#5EC9A5] border-none text-white px-6 flex items-center gap-2 hover:bg-[#4CAF93] btn-import">
            Import
        </button>
    </form>

</div>

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

                {{-- ACTIONS --}}
                <td class="py-4 flex justify-center gap-4 md:gap-3 whitespace-nowrap">
                    {{-- View --}}
                    <a href="{{ url('pets/'.$pet->id) }}" class="text-[#5EC9A5] hover:text-[#2E6F56]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z">
                            </path>
                        </svg>
                    </a>

                    {{-- Edit --}}
                    <a href="{{ url('pets/'.$pet->id.'/edit') }}" class="text-[#5EC9A5] hover:text-[#2E6F56]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120Z">
                            </path>
                        </svg>
                    </a>

                    {{-- Delete --}}
                    <a href="javascript:;" data-name="{{ $pet->name }}" class="text-red-400 hover:text-red-600 btn_delete">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8Z">
                            </path>
                        </svg>
                    </a>

                    <form class="hidden" method="POST" action="{{ url('pets/'.$pet->id) }}">
                        @csrf
                        @method('delete')
                    </form>
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

{{-- MODALES --}}
<dialog id="modal_message" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Congratulations!</h3>
        <div role="alert" class="alert alert-success mt-4">
            <span>{{ session('message') }}</span>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop"><button>close</button></form>
</dialog>

<dialog id="modal_delete" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Are you sure?</h3>
        <div role="alert" class="alert alert-error alert-soft mt-4">
            <span>You want to delete: <strong class="fullname"></strong></span>
        </div>
        <div class="flex gap-2 mt-6 justify-end">
            <form method="dialog">
                <button class="btn btn-error btn-outline btn-sm">Cancel</button>
            </form>
            <button type="button" class="btn btn-success btn-outline btn-sm btn_confirm">Confirm</button>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop"><button>close</button></form>
</dialog>

@endsection

@section('js')
<script>
    $(document).ready(function (){

    // Modal Delete
    const modal_delete = document.getElementById('modal_delete');
    let $frm;

    $('table').on('click', '.btn_delete', function() {
        const name = $(this).data('name');
        $('.fullname').text(name);
        $frm = $(this).next();
        modal_delete.showModal();
    });

    $('.btn_confirm').on('click', function(e){
        e.preventDefault();
        $frm.submit();
    });

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
        $.post("search/pets", {'q': query, '_token': token}, function (data) {
            $('.datalist').html(data).hide().fadeIn(1000)
        })
    }, 500)

    $('body').on('input', '#qsearch', function(event) {
        event.preventDefault()
        const query = $(this).val()
        $('.datalist').html(`<tr><td colspan="9" class="text-center py-18"><span class="loading loading-spinner loading-xl"></span></td></tr>`)
        if(query != ''){ search(query) }
        else{ setTimeout(() => { window.location.replace('pets') }, 500); }
    });

    // Import
    $('.btn-import').click(function(){ $('#file').click(); })
    $('#file').change(function(){ $(this).parent().submit(); })

})
</script>
@endsection
