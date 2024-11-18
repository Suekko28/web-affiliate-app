@if ($paginator->hasPages())
    <div class="flex flex-col items-center justify-between space-y-4 mt-6">
        {{-- Showing Info --}}
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Showing
            @if ($paginator->firstItem())
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                to
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
            @else
                {{ $paginator->count() }}
            @endif
            of
            <span class="font-medium">{{ $paginator->total() }}</span> results
        </p>


        {{-- Pagination Links --}}
        <div class="pagination flex justify-center w-full space-x-1 mb-2">
            {{-- Tombol Previous --}}
            @if ($paginator->onFirstPage())
                <button
                    class="rounded-md border border-slate-200 py-2 px-3 text-center text-sm transition-all shadow-md hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2"
                    disabled>Prev</button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="rounded-md border border-slate-200 py-2 px-3 text-center text-sm transition-all shadow-md hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2">
                    Prev
                </a>
            @endif

            {{-- Nomor Halaman --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <button
                        class="rounded-md border border-slate-200 py-2 px-3 text-center text-sm transition-all shadow-md text-slate-600 ml-2"
                        disabled>{{ $element }}</button>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button
                                class="rounded-md border border-slate-200 py-2 px-3 text-center text-sm transition-all shadow-md text-white bg-slate-800 border-slate-800 ml-2"
                                disabled>{{ $page }}</button>
                        @else
                            <a href="{{ $url }}"
                                class="rounded-md border border-slate-200 py-2 px-3 text-center text-sm transition-all shadow-md hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 ml-2">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="rounded-md border border-slate-200 py-2 px-3 text-center text-sm transition-all shadow-md hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2">
                    Next
                </a>
            @else
                <button
                    class="rounded-md border border-slate-200 py-2 px-3 text-center text-sm transition-all shadow-md hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2"
                    disabled>Next</button>
            @endif
        </div>


    </div>
@endif
