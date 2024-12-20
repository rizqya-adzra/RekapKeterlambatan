@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center mt-4">
        <div class="flex-1 flex justify-center">
            <span class="relative z-0 inline-flex shadow-sm rounded-md">

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span aria-disabled="true" class="relative inline-flex items-center px-4 py-2 text-sm font-bold text-purple-700 bg-dark border border-gray-300 cursor-not-allowed leading-5 dark:bg-gray-700 dark:border-gray-600 dark:text-purple-400">
                            {{ $element }}
                        </span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-black bg-white border border-blue-600 cursor-default leading-5 rounded-md shadow-md dark:bg-blue-700 dark:border-blue-600">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md leading-5 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-600">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

            </span>
        </div>
    </nav>
@endif
