<div class="relative md:max-w-60">
    <form wire:submit="search" class="flex flex-wrap w-full">
        <input type="text" placeholder="Cari produk" wire:model="query"
            class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10" />
        <button
            class="z-10 h-full leading-snug font-normal text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-2 py-1">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>
