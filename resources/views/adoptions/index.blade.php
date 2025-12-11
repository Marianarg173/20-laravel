@extends('layouts.dashboard')

@section('title', 'Module Adoptions: Larapets 🐶')

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
            <path d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z"></path>
        </svg>
    </span>
    <span class="tracking-wide text-center">Module Adoptions</span>
</h1>

{{-- Options --}}
<div class="join mx-auto mb-6 flex flex-wrap gap-2 justify-center">
    <a class="btn join-item bg-[#5EC9A5] text-white hover:bg-[#3FA182] shadow-md" href="{{ url('export/adoptions/pdf') }}">
        Export PDF
    </a>
    <a class="btn join-item bg-[#5EC9A5] text-white hover:bg-[#3FA182] shadow-md" href="{{ url('export/adoptions/excel') }}">
        Export Excel
    </a>
</div>

{{-- Search --}}
<label class="input text-gray-700 bg-white border border-[#A8F1D0] shadow-sm rounded-xl mb-10 w-full max-w-md mx-auto flex items-center gap-2">
    <svg class="h-[1em] opacity-60 text-[#5EC9A5]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.3-4.3"></path>
        </g>
    </svg>
    <input id="qsearch" type="search" placeholder="Search by Pet or User..." name="qsearch" class="text-gray-700 w-full" />
</label>

@csrf

{{-- Adoptions Cards --}}
<div class="datalist">
    @forelse ($adoptions as $adoption)
    <div class="flex flex-col items-center mb-8 w-full max-w-lg mx-auto bg-gradient-to-br from-[#2d3748] to-[#1f2937] rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">

        {{-- Photos --}}
        <div class="flex justify-center gap-4 -space-x-6">
            <div class="avatar">
                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-[#5EC9A5] shadow-inner">
                    <img src="{{ asset('photos/'.$adoption->user->photo) }}" alt="User Photo" />
                </div>
            </div>
            <div class="avatar">
                <div class="w-32 h-32 rounded-xl overflow-hidden border-4 border-[#A8F1D0] shadow-inner">
                    <img src="{{ asset('photos/'.$adoption->pet->image) }}" alt="Pet Photo" />
                </div>
            </div>
        </div>

        {{-- Info --}}
        <h4 class="text-white text-center mt-4 text-lg">
            <span class="underline font-bold text-[#FDE68A]">{{ $adoption->pet->name }}</span>
            was adopted by
            <span class="underline font-bold text-[#34D399]">{{ $adoption->user->fullname }}</span>
            <br>
            <span class="text-gray-300 text-sm">{{ $adoption->created_at->diffForHumans() }}</span>
        </h4>

        {{-- Show Button --}}
        <a href="{{ url('adoptions/'.$adoption->id) }}" class="btn btn-outline text-white mt-4 flex items-center gap-2 hover:bg-[#3FA182] shadow-md">
            Show More
        </a>

    </div>
    @empty
    <div class="text-center text-white bg-black/50 rounded-xl p-4 mt-10 max-w-md mx-auto">
        No results found.
    </div>
    @endforelse
</div>

{{-- Paginación --}}
<div class="mt-6 w-full max-w-lg mx-auto">
    {{ $adoptions->links('layouts.pagination') }}
</div>

@endsection

@section('js')
<script>
$(document).ready(function () {

    function debounce(func, wait) {
        let timeout;
        return function(...args) {
            const later = () => { clearTimeout(timeout); func(...args); };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        }
    }

    const search = debounce(function(query) {
        const token = $('input[name=_token]').val();
        $.ajax({
            url: '/search/adoptions',
            method: 'POST',
            data: {q: query, _token: token},
            success: function(data){
                const container = $('.datalist');
                container.empty();

                if(data.length === 0){
                    container.append(`
                        <div class="text-center text-white bg-black/50 rounded-xl p-4 mt-10 max-w-md mx-auto">
                            No results found.
                        </div>
                    `);
                    return;
                }

                data.forEach(function(adoption){
                    container.append(`
                        <div class="flex flex-col items-center mb-8 w-full max-w-lg mx-auto bg-gradient-to-br from-[#2d3748] to-[#1f2937] rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="flex justify-center gap-4 -space-x-6">
                                <div class="avatar">
                                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-[#5EC9A5] shadow-inner">
                                        <img src="/photos/${adoption.user.photo}" alt="User Photo" />
                                    </div>
                                </div>
                                <div class="avatar">
                                    <div class="w-32 h-32 rounded-xl overflow-hidden border-4 border-[#A8F1D0] shadow-inner">
                                        <img src="/photos/${adoption.pet.image}" alt="Pet Photo" />
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-white text-center mt-4 text-lg">
                                <span class="underline font-bold text-[#FDE68A]">${adoption.pet.name}</span>
                                was adopted by
                                <span class="underline font-bold text-[#34D399]">${adoption.user.fullname}</span>
                                <br>
                                <span class="text-gray-300 text-sm">${adoption.created_at}</span>
                            </h4>
                            <a href="/adoptions/${adoption.id}" class="btn btn-outline text-white mt-4 flex items-center gap-2 hover:bg-[#3FA182] shadow-md">
                                Show More
                            </a>
                        </div>
                    `);
                });
            }
        });
    }, 500);

    $('body').on('input', '#qsearch', function() {
        const query = $(this).val().trim();
        if(query != '') {
            search(query);
        } else {
            window.location.reload();
        }
    });

});
</script>
@endsection
