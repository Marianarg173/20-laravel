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

    {{-- Text --}}
    <h4 class="text-white text-center mt-4 text-lg">
        <span class="underline font-bold text-[#FDE68A]">
            {{ $adoption->pet->name }}
        </span>
        was adopted by
        <span class="underline font-bold text-[#34D399]">
            {{ $adoption->user->fullname }}
        </span>
        <br>
        <span class="text-gray-300 text-sm">
            {{ $adoption->created_at->diffForHumans() }}
        </span>
    </h4>

    {{-- Button --}}
    <a href="{{ url('adoptions/'.$adoption->id) }}"
       class="btn btn-outline text-white mt-4 flex items-center gap-2 hover:bg-[#3FA182] shadow-md">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 256 256">
            <path d="M152,112a8,8,0,0,1-8,8H120v24a8,8,0,0,1-16,0V120H80a8,8,0,0,1,0-16h24V80a8,8,0,0,1,16,0v24h24A8,8,0,0,1,152,112Zm77.66,117.66a8,8,0,0,1-11.32,0l-50.06-50.07a88.11,88.11,0,1,1,11.31-11.31l50.07,50.06A8,8,0,0,1,229.66,229.66ZM112,184a72,72,0,1,0-72-72A72.08,72.08,0,0,0,112,184Z">
            </path>
        </svg>
        Show More
    </a>

</div>
@empty

{{-- NO RESULTS --}}
<div class="text-center text-gray-300 mt-10">
    <div class="border-t border-gray-500 w-2/3 mx-auto mb-3"></div>
    No results found.
</div>

@endforelse
