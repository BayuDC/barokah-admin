<div class="relative md:max-w-60 w-full">
    <select
        wire:model.live="{{ $model }}"
        class="block px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10">
        {{ $slot }}
    </select>
</div>
