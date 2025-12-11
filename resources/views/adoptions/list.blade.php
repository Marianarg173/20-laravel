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
    <a href="{{ url('adoptions/'.$adoption->id) }}"
        class="btn btn-outline text-white mt-4 flex items-center gap-2 hover:bg-[#3FA182] shadow-md">
        Show More
    </a>

</div>
@empty
<div class="text-center text-white bg-black/50 rounded-xl p-4 mt-10 max-w-md mx-auto">
    No results found.
</div>
@endforelse
