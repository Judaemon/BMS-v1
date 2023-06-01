<div class="p-4">
    <span class="sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-7xl"></span>
    <div class="flex flex-row pb-2 justify-between ">
        <h2 class="font-bold">Add Certificate Request</h2>

        <button onclick='Livewire.emit("closeModal")' class="bg-transparent text-cool-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
        </button>
    </div>

    <hr>

    <form wire:submit.prevent="submit" id="add-certificate-form">
        @wire
        <div class="grid grid-cols-1 md:grid-cols-6 gap-4 mt-4">
            @hasanyrole('Super Admin|Officer')
            <div class="col-span-3">
                <x-form-input wire:click.prevent="selectResident" readonly placeholder="Select Resident" name="user_fullname" label="Resident" />
            </div>
            @endhasallroles

            <div class="col-span-3">
                <x-form-select :options="$certificate_types" name="certificate_type" label="Type of certificate" />
            </div>

            <div class="col-span-3 md:col-span-6">
                <x-form-textarea placeholder="For getting ID" name="purpose" label="Purpose" />
            </div>
        </div>

        <div class="mt-8 flex flex-row justify-end space-x-4">
            <x-form-submit type="reset" class="block order-last !text-cool-gray-500 !bg-transparent hover:border-blue-500 border-2  hover:text-cool-gray-500">
                {{ __('Reset form') }}
            </x-form-submit>

            <x-form-submit type="submit" class="block w-30">
<<<<<<< HEAD
                {{ __('Add Certificate Request') }}
=======
                {{ __('Request Certificate ') }}
>>>>>>> b74268c43bc32a62205b59bb85109272345fdbc8
            </x-form-submit>
        </div>
        @endwire
    </form>
</div>
