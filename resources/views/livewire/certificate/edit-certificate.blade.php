<div class="p-4">
    <span class="sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-7xl"></span>
    <div class="flex flex-row pb-2 justify-between ">
        <h2 class="font-bold">Update Certificate</h2>
        
        <button onclick='Livewire.emit("closeModal")' class="bg-transparent text-cool-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
        </button>
    </div>

    <hr>

    <form wire:submit.prevent="submit" id="edit-certificate-form">
        @wire

        {{-- <h3 class="col-span-12 my-2 font-medium text-center text-gray-900">Incident Information</h3> --}}
        <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
            <div class="col-span-3">
                <x-form-input placeholder="Good moral" name="certificate.type" label="Type of certificate" />
            </div>

            <div class="col-span-3">
                <x-form-input placeholder="Barangay Captain" name="certificate.office" label="Office of" />
            </div>

            <div class="col-span-2">
                <x-form-input type="file" placeholder="logo 1" name="certificate.logo_1" label="Logo 1" />
            </div>

            <div class="col-span-2">
                <x-form-input type="file" placeholder="logo 2" name="certificate.logo_2" label="Logo 2" />
            </div>

            <div class="col-span-2">
                <x-form-input type="file" placeholder="logo 3" name="certificate.logo_3" label="Logo 3" />
            </div>
        </div>

        <div class="mt-4 flex flex-row justify-end space-x-4">
            <x-form-submit type="submit" class="block w-30">
                {{ __('Update User') }}
            </x-form-submit>
        </div>
        @endwire
    </form>
</div>
