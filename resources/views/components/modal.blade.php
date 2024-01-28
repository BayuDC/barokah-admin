<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
    x-bind:class="{ 'hidden': !open, 'flex': open }">
    <div class="relative w-auto my-6 mx-auto max-w-sm">
        <!--content-->
        <div
            class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                <h3 class="text-3xl font-semibold">
                    Konfirmasi
                </h3>
            </div>
            <!--body-->
            <div class="relative p-6 flex-auto">
                <p class="text-blueGray-500 leading-relaxed">
                    {{ $slot }}
                </p>
            </div>
            <!--footer-->
            <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                <button
                    class="text-blueGray-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none ease-linear transition-all duration-150"
                    type="button" x-on:click="cancel">
                    Tidak
                </button>
                <button
                    class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150"
                    type="button" x-on:click="confirm">
                    Iya
                </button>
            </div>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" x-bind:class="{ 'hidden': !open, 'flex': open }"
    id="small-modal-id-backdrop"></div>
