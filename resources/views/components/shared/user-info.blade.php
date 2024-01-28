 <x-form>
     <x-form-group>
         <x-input-info label="Nama" :value="$user->name" />
         <x-input-info label="Email" :value="$user->email" />
     </x-form-group>
     <x-form-divider />
     <div class="grid lg:grid-cols-[15rem_1fr] gap-x-4 gap-y-2">
         <div class="relative mb-3 w-full row-span-3">
             <label class="mb-2 block text-xs font-bold uppercase text-blueGray-600">
                 Foto
             </label>
             <div
                 class="bg-white w-60 aspect-square mx-auto md:mx-0 border-2 border-gray-300 rounded-md md:mt-0 mt-4 overflow-hidden">
                 <img src="{{ $user['picture_url'] }}" class="w-full" />
             </div>
         </div>

         <x-input-info label="Jenis Kelamin" :value="$user->genderPretty" />
         <x-input-info label="No Telepon" :value="$user->phone" />
         <x-input-info label="Alamat" :value="$user->address" />

         @if ($user->role != 'user')

             <div class="w-full">
                 <div class="relative w-full mb-3">
                     <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                         Kata Sandi
                     </label>
                     @if ($user->id == Auth::user()->id)
                         <a
                             href="/admin/password"
                             class="bg-purple-500 text-white text-center active:bg-purple-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150 w-full"
                             type="button">
                             <i class="fas fa-lock"></i> Ganti Kata Sandi
                         </a>
                     @else
                         <div x-data="{
                             open: false,
                             cancel() { this.open = false },
                             confirm() { $wire.resetPassword() }
                         }">
                             <button
                                 x-on:click="open = true"
                                 class="bg-purple-500 text-white active:bg-purple-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150 w-full"
                                 type="button">
                                 <i class="fas fa-unlock"></i> Reset Kata Sandi
                             </button>
                             <x-modal>
                                 Apakah anda yakin akan mengembalikan kata sandi ke pengaturan awal (barokahku)
                             </x-modal>
                         </div>
                     @endif
                 </div>
             </div>
             <x-input-info label="Peran" :value="$user->rolePretty" />
         @endif
     </div>
 </x-form>
