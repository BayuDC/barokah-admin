<div class="w-full mb-6 px-4" {{ $attributes }}>
    <div class="relative flex flex-col min-w-0 break-words w-full shadow-lg rounded bg-white"
        @style(['height: calc(100vh - 2rem)' => isset($full) && $full])>
        <div class="rounded-t mb-0 px-4 py-3 border-0">
            <div class="flex flex-col md:flex-row flex-wrap items-center gap-4">
                <h3 class="font-semibold text-xl text-blueGray-700 w-full lg:w-auto lg:mr-auto">
                    {{ $title }}
                </h3>
                @isset($header)
                    {{ $header }}
                @endisset
            </div>
        </div>
        <div class="block w-full overflow-x-auto mb-auto">
            {{ $slot }}
        </div>
        @isset($footer)
            <div class="bg-blueGray-50 text-blueGray-500 px-4 py-3">
                {{ $footer }}
            </div>
        @endisset
    </div>
</div>
