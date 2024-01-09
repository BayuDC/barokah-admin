@if ($paginator->hasPages())
<nav class="">
    <div class="flex flex-col lg:flex-row justify-between items-center">
        <div>
            <ul class="flex pl-0 rounded list-none flex-wrap">

                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <li>
                    <span class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-pink-200 text-white bg-pink-200">
                        <i class="fas fa-chevron-left -ml-px"></i>
                        <i class="fas fa-chevron-left -ml-px"></i>
                    </span>
                </li>
                <li class="hidden md:block">
                    <span class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-pink-200 text-white bg-pink-200">
                        <i class="fas fa-chevron-left -ml-px"></i>
                    </span>
                </li>
                @else
                <li>
                    <a href="{{ $paginator->url(1) }}" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-pink-500 bg-white text-pink-500">
                        <i class="fas fa-chevron-left -ml-px"></i>
                        <i class="fas fa-chevron-left -ml-px"></i>
                    </a>
                </li>
                <li class="hidden md:block">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-pink-500 bg-white text-pink-500">
                        <i class="fas fa-chevron-left -ml-px"></i>
                    </a>
                </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)

                {{-- Array Of Links --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li>
                    <span class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-pink-500 text-white bg-pink-500">
                        {{ $page }}
                    </span>
                </li>
                @else
                @if (($page > $paginator->currentPage() - 3) && ($page < $paginator->currentPage() + 3))
                    <li>
                        <a href="{{ $url }}" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-pink-500 bg-white text-pink-500">
                            {{ $page }}
                        </a>
                    </li>

                    @endif
                    @endif
                    @endforeach
                    @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())

                    <li class="hidden md:block">
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-pink-500 bg-white text-pink-500">
                            <i class="fas fa-chevron-right -mr-px"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $paginator->url($paginator->lastPage()) }}" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-pink-500 bg-white text-pink-500">
                            <i class="fas fa-chevron-right -ml-px"></i>
                            <i class="fas fa-chevron-right -ml-px"></i>
                        </a>
                    </li>
                    @else

                    <li class="hidden md:block">
                        <span class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-pink-200 text-white bg-pink-200">
                            <i class="fas fa-chevron-right -mr-px"></i>
                        </span>
                    </li>
                    <li>
                        <span class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-pink-200 text-white bg-pink-200">
                            <i class="fas fa-chevron-right -ml-px"></i>
                            <i class="fas fa-chevron-right -ml-px"></i>
                        </span>
                    </li>
                    @endif
            </ul>
        </div>
        <div class="mt-2 lg:mt-0">
            <p class="small text-muted">
                Item ke
                <span class="font-bold">{{ $paginator->firstItem() }}</span>-<span class="font-bold">{{ $paginator->lastItem() }}</span>
                dari
                <span class="font-bold">{{ $paginator->total() }}</span>
            </p>
        </div>
    </div>
</nav>
@endif