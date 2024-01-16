<div class="w-full">
    <div class="relative w-full mb-3">
        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="{{ $model }}">
            {{ $label }}
        </label>
        <select id="{{ $model }}" name="{{ $model }}" wire:model="{{ $model }}"
            @class([
                'px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150',
                $errors->has($model)
                    ? 'border-2 border-red-500'
                    : 'border-2 border-transparent',
            ])>
            <option />
            {{ $slot }}
        </select>

        <div class="text-sm mt-2 text-red-500 text-right ">
            @error($model)
                {{ $message }}
            @enderror
        </div>

    </div>
</div>
