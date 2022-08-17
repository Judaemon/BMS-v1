<div class="p-4">
    <span class="sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-7xl"></span>
    <div class="flex flex-row pb-2 justify-between ">
        <h2 class="font-bold">Blotter Information</h2>
        
        <button onclick='Livewire.emit("closeModal")' class="bg-transparent text-cool-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
        </button>
    </div>
    @php
        // echo '<pre>'; print_r($blotter->incident_date_time); echo '</pre>';
    @endphp

    <hr>

    <script>
    </script>
    <form wire:submit.prevent="submit" id="add-blotter-form">
        <section>
            <h3 class="col-span-12 my-2 font-bold text-gray-900">Incident Information</h3>

            <div class="grid grid-cols-6 xl:grid-cols-12 gap-4 mb-4 pt-2">
                @wire
                    <div class="col-span-6 md:col-span-6">
                        <x-form-input readonly name="blotter.incident_type" placeholder="Incident type" label="Incident type"/>
                    </div>
                    <div class="col-span-6 md:col-span-6">
                        <x-form-input readonly name="blotter.incident_location" placeholder="Incident location" label="Incident location"/>
                    </div>
                    <div class="col-span-6 md:col-span-2 xl:col-span-4">
                        <x-form-input type="datetime-local" readonly name="blotter.incident_date_time" label="Date and time of the incident"/>
                    </div>
                    <div class="col-span-6 md:col-span-2 xl:col-span-4">
                        <x-form-input type="datetime-local" readonly name="blotter.reported_date_time" label="Date and time Reported"/>
                    </div>
                    <div class="col-span-6 md:col-span-2 xl:col-span-4">
                        <x-form-input type="datetime-local" readonly name="blotter.meeting_schedule_date_time" label="Schedule of next meeting"/>
                    </div>
                    <div class="col-span-6 xl:col-span-12">
                        <x-form-textarea readonly name="blotter.incident_narrative" label="Incident narrative"/>
                    </div>
                @endwire
            </div>
        </section>

        <hr>
        
        <section>
            <h3 class="col-span-12 my-2 font-bold text-gray-900">Involved Residents</h3>

            <div class="grid grid-cols-6 xl:grid-cols-12 gap-4 mb-4 pt-2">
                @wire
                    <div class="col-span-6 md:col-span-6">
                        <x-form-input readonly name="blotter.incident_type" placeholder="Incident type" label="Incident type"/>
                    </div>
                    <div class="col-span-6 md:col-span-6">
                        <x-form-input readonly name="blotter.incident_location" placeholder="Incident location" label="Incident location"/>
                    </div>
                    <div class="col-span-6 md:col-span-2 xl:col-span-4">
                        <x-form-input type="datetime-local" readonly name="blotter.incident_date_time" label="Date and time of the incident"/>
                    </div>
                    <div class="col-span-6 md:col-span-2 xl:col-span-4">
                        <x-form-input type="datetime-local" readonly name="blotter.reported_date_time" label="Date and time Reported"/>
                    </div>
                    <div class="col-span-6 md:col-span-2 xl:col-span-4">
                        <x-form-input type="datetime-local" readonly name="blotter.meeting_schedule_date_time" label="Schedule of next meeting"/>
                    </div>
                    <div class="col-span-6 xl:col-span-12">
                        <x-form-textarea readonly name="blotter.incident_narrative" label="Incident narrative"/>
                    </div>
                @endwire
            </div>
        </section>
        <div class="mt-4 flex flex-row-reverse space-x-4">
            <x-button type="submit" class="block w-30">
                {{ __('Save') }}
            </x-button>
        </div>
    </form>
</div>
