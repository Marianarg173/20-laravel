@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="w-full flex justify-center mt-6">

    {{-- 📱 MOBILE --}}
    <div class="flex items-center gap-2 md:hidden">

        {{-- Botón Anterior --}}
        @if ($paginator->onFirstPage())
        <span
            class="px-3 py-2 text-sm font-medium text-gray-300 bg-white border border-gray-200 rounded-md cursor-default">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}"
            class="px-3 py-2 text-sm font-medium text-[#2E6F56] bg-[#A8F1D0] border border-[#A8F1D0] rounded-md hover:bg-[#5EC9A5] transition">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </a>
        @endif

        {{-- Página actual SOLO en móvil --}}
        <span class="px-4 py-2 text-sm font-semibold bg-[#5EC9A5] text-white rounded-md">
            {{ $paginator->currentPage() }}
        </span>

        {{-- Botón Siguiente --}}
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"
            class="px-3 py-2 text-sm font-medium text-[#2E6F56] bg-[#A8F1D0] border border-[#A8F1D0] rounded-md hover:bg-[#5EC9A5] transition">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </a>
        @else
        <span
            class="px-3 py-2 text-sm font-medium text-gray-300 bg-white border border-gray-200 rounded-md cursor-default">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </span>
        @endif

    </div>



    {{-- 💻 DESKTOP / TABLET --}}
    <div class="hidden md:flex items-center gap-1">

        {{-- Botón Anterior --}}
        @if ($paginator->onFirstPage())
        <span
            class="px-3 py-2 text-sm font-medium text-gray-300 bg-white border border-gray-200 rounded-l-md cursor-default">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}"
            class="px-3 py-2 text-sm font-medium text-emerald-700 bg-white border border-gray-200 rounded-l-md hover:bg-emerald-50 transition">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </a>
        @endif



        {{-- Números de páginas --}}
        @foreach ($elements as $element)

        {{-- Separador ... --}}
        @if (is_string($element))
        <span class="px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-200 cursor-default">
            {{ $element }}
        </span>
        @endif

        {{-- Enlaces numéricos --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)

        @if ($page == $paginator->currentPage())
        <span aria-current="page">
            <span class="px-4 py-2 text-sm font-medium bg-emerald-600 text-white border border-emerald-600">
                {{ $page }}
            </span>
        </span>
        @else
        <a href="{{ $url }}"
            class="px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-200 hover:bg-emerald-50 hover:text-emerald-700 transition">
            {{ $page }}
        </a>
        @endif

        @endforeach
        @endif

        @endforeach



        {{-- Botón Siguiente --}}
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"
            class="px-3 py-2 text-sm font-medium text-emerald-700 bg-white border border-gray-200 rounded-r-md hover:bg-emerald-50 transition">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </a>
        @else
        <span
            class="px-3 py-2 text-sm font-medium text-gray-300 bg-white border border-gray-200 rounded-r-md cursor-default">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </span>
        @endif

    </div>

</nav>
@endif