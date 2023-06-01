<div class="p-4">
    <span class="sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-7xl"></span>
    <div class="flex flex-row pb-2 justify-between ">
        <h2 class="font-bold">Update Certificate Request</h2>
        
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
            <div class="col-span-3">
                <x-form-input readonly placeholder="Select Resident" name="fullname" label="Resident" />
            </div>

            <div class="col-span-3">
                <x-form-input disable name="certificate_request.certificate_type" label="Type of certificate" />
            </div>

            <div class="col-span-3 md:col-span-6">
                <x-form-textarea readonly placeholder="For getting ID" name="certificate_request.purpose" label="Purpose" />
            </div>

            <div class="col-span-3">
                <x-form-input readonly name="certificate_request.status" label="Status" />
            </div>

            @if ($certificate_request["status"] == "Unpaid")
            <div class="col-span-1">
                <p class="block mb-1 text-sm font-medium text-gray-600 dark:text-gray-400">Set status to paids</p>
                <x-form-submit wire:click="setStatusToPaid" type="button" class="block w-32 py-2">
                    {{ __('Paid') }}
                </x-form-submit>
            </div>
            @endif

            @if ($certificate_request["status"] == "Paid")
            <div class="col-span-2">
                <p class="block mb-1 text-sm font-medium text-gray-600 dark:text-gray-400">Set status to released (printable)</p>
                <x-form-submit wire:click="setStatusToReleased" type="button" class="block w-32 py-2">
                    {{ __('Release') }}
                </x-form-submit>
            </div>
            @endif

            @if ($certificate_request["status"] == "Released")
            <div class="col-span-2">
                <p class="block mb-1 text-sm font-medium text-gray-600 dark:text-gray-400">Print certificate</p>
                <a 
                    class="w-48 flex flex-row space-x-2 justify-center px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring"    
                    href="{{ route('print',[$certificate_request['certificate_type'], $certificate_request['user_id']]) }}" target="_blank" rel="noopener noreferrer">Print certificate
                </a>
            </div>
            @endif
        </div>

        <div class="mt-8 flex flex-row justify-end space-x-4">
            <x-form-submit type="submit" class="block w-30">
                {{ __('Save Certificate Request') }}
            </x-form-submit>
        </div>
        @endwire
    </form>
</div>
