<form wire:submit="submit">
    <div class="relative w-full mb-3">
        <label
            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
            for="grid-password">Email</label>
        <input
            wire:model="email"
            type="text"
            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
    </div>
    <div class="relative w-full mb-3">
        <label
            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
            for="grid-password">Kata Sandi</label>
        <input
            wire:model="password"
            type="password"
            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
    </div>
    @if ($error)
        <div class="text-white p-4 border-0 rounded relative mb-4 bg-red-500 mt-6 text-center">
            Login gagal!
        </div>
    @endif
    <div class="text-center mt-6">
        <button
            class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
            type="submit">
            Masuk
        </button>
    </div>
</form>
