<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            <div class="flex justify-between flex-1 lg:hidden">
                <span>
                    <button wire:click="gotoPage('1')"
                        class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-5 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" @if ($paginator->onFirstPage()) disabled @endif>
                        <i class="fas fa-chevron-left -ml-px"></i>
                        <i class="fas fa-chevron-left -ml-px"></i>
                    </button>
                    <button wire:click="previousPage('{{ $paginator->getPageName() }}')"
                        class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-5 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" @if ($paginator->onFirstPage()) disabled @endif>
                        <i class="fas fa-chevron-left -ml-px"></i>
                    </button>
                </span>

                <span>
                    <button wire:click="nextPage('{{ $paginator->getPageName() }}')"
                        class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-5 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" @if (!$paginator->hasMorePages()) disabled @endif>
                        <i class="fas fa-chevron-right -mr-px"></i>
                    </button>
                    <button wire:click="gotoPage('{{ $paginator->lastPage() }}')"
                        class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-5 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" @if (!$paginator->hasMorePages()) disabled @endif>
                        <i class="fas fa-chevron-right -mr-px"></i>
                        <i class="fas fa-chevron-right -mr-px"></i>
                    </button>
                </span>
            </div>

            <div class="hidden lg:flex-1 lg:flex lg:items-center lg:justify-between">
                <div>
                    <p class="text text-gray-700 leading-5">
                        Item ke
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        -
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        dari
                        <span class="font-medium">{{ $paginator->total() }}</span>
                    </p>
                </div>

                <div>
                    <span class="relative z-0 inline-flex rounded-md shadow-sm">
                        <span>
                            <button type="button" wire:click="gotoPage('1')" @class([
                                'relative inline-flex items-center px-2 py-2 text-sm font-medium border border-solid border-pink-500 bg-white text-pink-500 leading-5 rounded-l-md',
                                'focus:z-10 focus:outline-none focus:shadow-outline-blue active:bg-gray-100 transition ease-in-out duration-150 hover:bg-pink-100' => !$paginator->onFirstPage(),
                            ])
                                @if ($paginator->onFirstPage()) disabled @endif>
                                <div class="w-6 h-5 flex items-center justify-center leading-tight">
                                    <i class="fas fa-chevron-left -ml-px block"></i>
                                    <i class="fas fa-chevron-left -ml-px block"></i>
                                </div>
                            </button>
                            <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                                @class([
                                    'relative inline-flex items-center px-2 py-2 text-sm font-medium border border-solid border-pink-500 bg-white text-pink-500 leading-5 -ml-1.5',
                                    'focus:z-10 focus:outline-none focus:shadow-outline-blue active:bg-gray-100 transition ease-in-out duration-150 hover:bg-pink-100' => !$paginator->onFirstPage(),
                                ]) @if ($paginator->onFirstPage()) disabled @endif>
                                <div class="w-5 h-5 flex items-center justify-center leading-tight">
                                    <i class="fas fa-chevron-left -ml-px block"></i>
                                </div>
                            </button>
                        </span>

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <span aria-current="page">
                                                <span
                                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium border border-solid border-pink-500 text-white bg-pink-500 cursor-default leading-5 select-none">{{ $page }}</span>
                                            </span>
                                        @elseif ($page > $paginator->currentPage() - 3 && $page < $paginator->currentPage() + 3)
                                            <button type="button"
                                                wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium border border-solid border-pink-500 bg-white text-pink-500 leading-5 focus:z-10 focus:outline-none focus:shadow-outline-blue active:bg-gray-100 hover:bg-pink-100 transition ease-in-out duration-150">{{ $page }}
                                            </button>
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach

                        <span>
                            <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                                @class([
                                    'relative inline-flex items-center px-2 py-2 text-sm font-medium border border-solid border-pink-500 bg-white text-pink-500 leading-5 -ml-px',
                                    'focus:z-10 focus:outline-none focus:shadow-outline-blue active:bg-gray-100 transition ease-in-out duration-150 hover:bg-pink-100' => $paginator->hasMorePages(),
                                ]) @if (!$paginator->hasMorePages()) disabled @endif>
                                <div class="w-5 h-5 flex items-center justify-center leading-tight">
                                    <i class="fas fa-chevron-right -mr-px block"></i>
                                </div>
                            </button>
                            <button type="button" wire:click="gotoPage(`{{ $paginator->lastPage() }}`)"
                                @class([
                                    'relative inline-flex items-center px-2 py-2 text-sm font-medium border border-solid border-pink-500 bg-white text-pink-500 leading-5 -ml-1.5 rounded-r-md',
                                    'focus:z-10 focus:outline-none focus:shadow-outline-blue active:bg-gray-100 transition ease-in-out duration-150 hover:bg-pink-100' => $paginator->hasMorePages(),
                                ]) @if (!$paginator->hasMorePages()) disabled @endif>
                                <div class="w-6 h-5 flex items-center justify-center leading-tight">
                                    <i class="fas fa-chevron-right -mr-px block"></i>
                                    <i class="fas fa-chevron-right -mr-px block"></i>
                                </div>
                            </button>
                        </span>
                    </span>
                </div>
            </div>
        </nav>
    @endif
</div>
