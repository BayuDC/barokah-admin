<div class="w-full">
    <div class="relative mb-3 w-full">
        <label for="{{ $model }}" class="mb-2 block text-xs font-bold uppercase text-blueGray-600">
            {{ $label }}
        </label>

        <div x-data="{ active: false, filename: null }" class="grid grid-row-2 md:grid-cols-[1fr_auto]">
            <label
                @class([
                    'relative flex justify-center w-full h-40 px-4 transition bg-white border-2 rounded-md appearance-none cursor-pointer focus:outline-none',
                    $errors->has($model)
                        ? 'border-solid border-red-500'
                        : 'border-gray-300 hover:border-gray-400 border-dashed',
                ])
                x-on:dragover.prevent="active = true"
                x-on:dragleave="active = false"
                x-on:drop.prevent="e => {
                    file = e.dataTransfer.files[0];
                    filename = file.name;
                    @this.upload('picture', file);
                }"
                x-bind:class="active && 'bg-emerald-100'">
                <span class="grid grid-cols-[1fr_auto] items-center text-gray-600 font-medium ">
                    <span class="text-xl mr-2">
                        <i class="fas fa-file-image"></i>
                    </span>
                    <span x-text="filename || 'Lempar filemu kesini'" class="truncate">
                        Lempar filemu kesini
                    </span>
                </span>
                <input type="file"
                    id="{{ $model }}"
                    name="{{ $model }}"
                    class="hidden"
                    x-on:change="e => filename = e.target.files[0].name"
                    wire:model="{{ $model }}">
            </label>

            @if ($preview)
                <div
                    class="bg-white h-40 w-40 mx-auto border-2 border-gray-300 rounded-md md:ml-4 md:mt-0 mt-4 overflow-hidden">
                    <img src="{{ $preview }}" />
                </div>
            @endisset
    </div>


    <div class="mt-2 text-right text-sm text-red-500">
        @error($model)
            {{ $message }}
        @enderror
    </div>
</div>
</div>
