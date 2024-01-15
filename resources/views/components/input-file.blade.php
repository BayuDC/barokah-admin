<div class="w-full">
    <div class="relative w-full mb-3">
        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="{{ $model }}">
            {{ $label }}
        </label>

        <div class="" x-data="{ active: false, filename: null }">
            <label @class([
                'relative flex justify-center w-full h-32 px-4 transition bg-white border-2 rounded-md appearance-none cursor-pointer hover:border-gray-400 focus:outline-none',
                $errors->has($model)
                    ? 'border-solid border-red-500'
                    : 'border-gray-300 border-dashed',
            ]) x-on:dragover.prevent="active = true" x-on:dragleave="active = false"
                x-on:drop.prevent="e => {
                    file = e.dataTransfer.files[0];
                    filename = file.name;
                    @this.upload('picture', file);
                }"
                x-bind:class="{ 'bg-emerald-100': active }">
                <span class="flex items-center space-x-2 text-gray-600">
                    <span class="text-xl">
                        <i class="fas fa-file-image"></i>
                    </span>
                    <span class="font-medium" x-text="filename || 'Lempar filemu kesini'">
                        Lempar filemu kesini
                    </span>
                </span>
                <input type="file" id="{{ $model }}" name="{{ $model }}" class="hidden"
                    x-on:change="e => filename = e.target.files[0].name" wire:model="{{ $model }}">
            </label>
        </div>

        <div class="text-sm mt-2 text-red-500 text-right ">
            @error($model)
                {{ $message }}
            @enderror
        </div>

    </div>
</div>
