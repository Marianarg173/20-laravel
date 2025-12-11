@forelse($pets as $pet)
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

    {{-- NOMBRE --}}
    <td class="py-3 font-medium text-[#2E6F56] whitespace-nowrap">{{ $pet->name }}</td>

    {{-- KIND --}}
    <td class="py-3">{{ $pet->kind }}</td>

    {{-- EDAD --}}
    <td class="py-3">{{ $pet->age }}</td>

    {{-- RAZA --}}
    <td class="py-3">{{ $pet->breed }}</td>

    {{-- ACTIVE --}}
    <td class="hidden md:table-cell">
        @if ($pet->active == 1)
        <div class="badge bg-[#5EC9A5] text-white">Active</div>
        @else
        <div class="badge bg-red-300 text-red-700">Inactive</div>
        @endif
    </td>

    {{-- STATUS --}}
    <td class="hidden md:table-cell">
        @if ($pet->status == 1)
        <div class="badge bg-[#5EC9A5] text-white">Adopted</div>
        @else
        <div class="badge bg-red-300 text-red-700">Not Adopted</div>
        @endif
    </td>

    {{-- ACTIONS --}}
    <td class="py-4 flex justify-center gap-4 md:gap-3 whitespace-nowrap">

        {{-- VIEW --}}
        <a href="{{ url('pets/'.$pet->id) }}" class="text-[#5EC9A5] hover:text-[#2E6F56]">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
                <path
                    d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z">
                </path>
            </svg>
        </a>

        {{-- EDIT --}}
        <a href="{{ url('pets/'.$pet->id.'/edit') }}" class="text-[#5EC9A5] hover:text-[#2E6F56]">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
                <path
                    d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120Z">
                </path>
            </svg>
        </a>

        {{-- DELETE --}}
        <a href="javascript:;" data-name="{{ $pet->name }}" class="text-red-400 hover:text-red-600 btn_delete">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
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

@empty
<tr class="bg-[#0009]">
    <td colspan="9" class="text-center py-18 text-gray-700">No results found!</td>
</tr>
@endforelse
