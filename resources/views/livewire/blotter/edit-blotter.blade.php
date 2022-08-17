<div class="p-4">
    <span class="sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-7xl"></span>
    <div class="flex flex-row pb-2 justify-between ">
        <h2 class="font-bold">Edit Blotter</h2>
        
        <button onclick='Livewire.emit("closeModal")' class="bg-transparent text-cool-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
        </button>
    </div>
    @php
        // value="{{ $blotter['residents'][0]['pivot']['narrative'] }}"
        // echo '<pre>'; print_r($blotter['incident_date_time']); echo '</pre>';
        // echo '<pre>'; print_r($blotter->residents[0]->pivot["narrative"]); echo '</pre>';
    @endphp

    <hr>

    <script>
    </script>
    <form wire:submit.prevent="submit" id="add-blotter-form">
        <h3 class="col-span-12 my-2 font-medium text-center text-gray-900">Incident Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-6 xl:grid-cols-12 gap-4 mb-4">
            <div class="col-span-6">
                <x-label :value="__('Incident type')" for="incident_type"/>
                <x-input type="text"
                    wire:model.defer="blotter.incident_type"
                    id="incident_type"
                    name="incident_type"
                    value="{{ old('incident_type') }}"
                    placeholder="Incident type"
                    class="block w-full"
                    {{-- required --}}
                    autofocus/>
            </div>
            <div class="col-span-6">
                <x-label :value="__('Incident location')" for="incident_location"/>
                <x-input type="text"
                    wire:model.defer="blotter.incident_location"
                    id="incident_location"
                    name="incident_location"
                    value="{{ old('incident_location') }}"
                    placeholder="Incident location"
                    class="block w-full"
                    {{-- required --}}/>
            </div>
            <div class="col-span-4">
                <x-label :value="__('Date and time of incident')" for="incident_date_time"/>
                <x-input type="datetime-local"
                    id="incident_date_time"
                    name="incident_date_time"
                    value="{{ $blotter->incident_date_time }}"
                    class="block w-full"
                    readonly
                    {{-- required --}}/>
            </div>
            <div class="col-span-4">
                <x-label :value="__('Date and time Reported')" for="reported_date_time"/>
                <x-input type="datetime-local"
                    {{-- wire:model.defer="blotter.reported_date_time" --}}
                    id="reported_date_time"
                    name="reported_date_time"
                    value="{{ $blotter->reported_date_time }}"
                    readonly
                    class="block w-full"
                    {{-- required --}}/>
            </div>
            <div class="col-span-4">
                <x-label :value="__('Schedule of next meeting')" for="meeting_schedule_date_time"/>
                <x-input type="datetime-local"
                    {{-- wire:model.defer="blotter.meeting_schedule_date_time" --}}
                    id="schedule_date_meeting_schedule_date_timetime"
                    name="meeting_schedule_date_time"
                    value="{{ $blotter->meeting_schedule_date_time }}"
                    class="block w-full"
                    {{-- required --}}/>
            </div>
            <div class="col-span-12"> 
                <x-label :value="__('Incident narrative')" for="incident_narrative"/>
                <x-textarea 
                    wire:model.defer="blotter.incident_narrative"
                    id="incident_narrative"
                    name="incident_narrative"
                    placeholder="Your message..." 
                    {{-- required --}}/>
            </div>

            {{-- Complainants --}}
            <section class="col-span-12 pb-2">
                {{-- separator line --}}
                <div class="flex items-center">
                    <h3 class="flex-shrink my-2 font-medium text-sm text-gray-700 mr-2">Complainants</h3>
                    <div class="flex-grow h-px bg-gray-500/50"></div> {{-- line --}} 
                </div>

                
                <table class="table-fixed">
                    <thead>
                        <tr>
                            <th class="w-3/12">Name</th>
                            <th class="w-7/12">Narrative</th>
                            <th class="w-2/12">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blotter->residents as $index => $resident)
                            @if ($resident->pivot['role'] == 'Complainant')
                            <tr>
                                <td class="flex px-2">
                                    <x-input type="text"
                                        autocomplete="off"
                                        readonly
                                        id="residents[{{$index}}][fullname]"
                                        name="residents[{{$index}}][fullname]"
                                        value="{{ $resident->firstname .' '. $resident->lastname}}"
                                        placeholder="Name"
                                        class="block w-full"
                                        {{-- required --}}/>
                                </td>
                                <td class="col-span-6 pr-2">
                                    <x-textarea type="text"
                                    {{-- $blotter->residents[0]->pivot["narrative"] --}}
                                        wire:model.defer="blotter.residents.{{$index}}.pivot.narrative"
                                        placeholder="I saw ...."
                                        class="block w-full mb-2"
                                    >
                                        <x-slot name="text">
                                            {{ $blotter->residents[$index]->pivot['narrative'] }}
                                        </x-slot>
                                    </x-textarea>
                                </td>
                                <td class="col-span-2 px-2 flex">
                                    <x-button type="button" wire:click.prevent="removeComplainant({{$index}})" class="px-4 w-max bg-red-600 hover:bg-red-700">
                                        {{ __('Remove') }}
                                        <x-slot name="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </x-slot>
                                    </x-button>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                <div class="col-span-4 px-2">
                    <x-button type="button" wire:click.prevent="addComplainant" class="px-2">
                        {{ __('Add Complainant') }}
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                              </svg>
                        </x-slot>
                    </x-button>
                </div>
            </section>

            {{-- Victim --}}
            <section class="col-span-12 pb-2">
                {{-- separator line --}}
                <div class="flex items-center">
                    <h3 class="flex-shrink my-2 font-medium text-sm text-gray-700 mr-2">Victims</h3>
                    <div class="flex-grow h-px bg-gray-500/50"></div> {{-- line --}} 
                </div>

                
                <table class="table-fixed">
                    <thead>
                        <tr>
                            <th class="w-3/12">Name</th>
                            <th class="w-7/12">Narrative</th>
                            <th class="w-2/12">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blotter->residents as $index => $resident)
                            @if ($resident->pivot['role'] == 'Victim')
                            <tr>
                                <td class="flex px-2">
                                    <x-input type="text"
                                        autocomplete="off"
                                        readonly
                                        id="residents[{{$index}}][fullname]"
                                        name="residents[{{$index}}][fullname]"
                                        value="{{ $resident->firstname .' '. $resident->lastname}}"
                                        placeholder="Name"
                                        class="block w-full"
                                        {{-- required --}}/>
                                </td>
                                <td class="col-span-6 pr-2">
                                    <x-textarea type="text"
                                        placeholder="I saw ...."
                                        class="block w-full mb-2"
                                    >
                                        <x-slot name="text">
                                            {{ $blotter->residents[$index]->pivot['narrative'] }}
                                        </x-slot>
                                    </x-textarea>
                                </td>
                                <td class="col-span-2 px-2 flex">
                                    <x-button type="button" wire:click.prevent="removeComplainant({{$index}})" class="px-4 w-max bg-red-600 hover:bg-red-700">
                                        {{ __('Remove') }}
                                        <x-slot name="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </x-slot>
                                    </x-button>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                <div class="col-span-4 px-2">
                    <x-button type="button" wire:click.prevent="addComplainant" class="px-2">
                        {{ __('Add Complainant') }}
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                              </svg>
                        </x-slot>
                    </x-button>
                </div>
            </section>

            {{-- Attacker --}}
            <section class="col-span-12 pb-2">
                {{-- separator line --}}
                <div class="flex items-center">
                    <h3 class="flex-shrink my-2 font-medium text-sm text-gray-700 mr-2">Attacker</h3>
                    <div class="flex-grow h-px bg-gray-500/50"></div> {{-- line --}} 
                </div>

                
                <table class="table-fixed">
                    <thead>
                        <tr>
                            <th class="w-3/12">Name</th>
                            <th class="w-7/12">Narrative</th>
                            <th class="w-2/12">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blotter->residents as $index => $resident)
                            @if ($resident->pivot['role'] == 'Attacker')
                            <tr>
                                <td class="flex px-2">
                                    <x-input type="text"
                                        autocomplete="off"
                                        readonly
                                        id="residents[{{$index}}][fullname]"
                                        name="residents[{{$index}}][fullname]"
                                        value="{{ $resident->firstname .' '. $resident->lastname}}"
                                        placeholder="Name"
                                        class="block w-full"
                                        {{-- required --}}/>
                                </td>
                                <td class="col-span-6 pr-2">
                                    <x-textarea type="text"
                                        placeholder="I saw ...."
                                        class="block w-full mb-2"
                                    >
                                        <x-slot name="text">
                                            {{ $blotter->residents[$index]->pivot['narrative'] }}
                                        </x-slot>
                                    </x-textarea>
                                </td>
                                <td class="col-span-2 px-2 flex">
                                    <x-button type="button" wire:click.prevent="removeComplainant({{$index}})" class="px-4 w-max bg-red-600 hover:bg-red-700">
                                        {{ __('Remove') }}
                                        <x-slot name="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </x-slot>
                                    </x-button>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                <div class="col-span-4 px-2">
                    <x-button type="button" wire:click.prevent="addComplainant" class="px-2">
                        {{ __('Add Complainant') }}
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                              </svg>
                        </x-slot>
                    </x-button>
                </div>
            </section>

            {{-- Respondent --}}
            <section class="col-span-12 pb-2">
                {{-- separator line --}}
                <div class="flex items-center">
                    <h3 class="flex-shrink my-2 font-medium text-sm text-gray-700 mr-2">Respondent</h3>
                    <div class="flex-grow h-px bg-gray-500/50"></div> {{-- line --}} 
                </div>

                
                <table class="table-fixed">
                    <thead>
                        <tr>
                            <th class="w-3/12">Name</th>
                            <th class="w-7/12">Narrative</th>
                            <th class="w-2/12">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blotter->residents as $index => $resident)
                            @if ($resident->pivot['role'] == 'Respondent')
                            <tr>
                                <td class="flex px-2">
                                    <x-input type="text"
                                        autocomplete="off"
                                        readonly
                                        id="residents[{{$index}}][fullname]"
                                        name="residents[{{$index}}][fullname]"
                                        value="{{ $resident->firstname .' '. $resident->lastname}}"
                                        placeholder="Name"
                                        class="block w-full"
                                        {{-- required --}}/>
                                </td>
                                <td class="col-span-6 pr-2">
                                    <x-textarea type="text"
                                        placeholder="I saw ...."
                                        class="block w-full mb-2"
                                    >
                                        <x-slot name="text">
                                            {{ $blotter->residents[$index]->pivot['narrative'] }}
                                        </x-slot>
                                    </x-textarea>
                                </td>
                                <td class="col-span-2 px-2 flex">
                                    <x-button type="button" wire:click.prevent="removeComplainant({{$index}})" class="px-4 w-max bg-red-600 hover:bg-red-700">
                                        {{ __('Remove') }}
                                        <x-slot name="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </x-slot>
                                    </x-button>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                <div class="col-span-4 px-2">
                    <x-button type="button" wire:click.prevent="addComplainant" class="px-2">
                        {{ __('Add Complainant') }}
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                              </svg>
                        </x-slot>
                    </x-button>
                </div>
            </section>

        </div>

        <div class="mt-4 flex flex-row-reverse space-x-4">
            <x-button type="submit" class="block w-30">
                {{ __('Save') }}
            </x-button>
        </div>
    </form>
</div>
