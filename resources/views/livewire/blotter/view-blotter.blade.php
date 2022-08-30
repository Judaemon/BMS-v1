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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blotter->users as $index => $user)
                            @if ($user->pivot['role'] == 'Complainant')
                            <tr>
                                <td class="flex px-2">
                                    <x-input type="text"
                                        autocomplete="off"
                                        readonly
                                        id="users[{{$index}}][fullname]"
                                        name="users[{{$index}}][fullname]"
                                        value="{{ $user->firstname .' '. $user->lastname}}"
                                        placeholder="Name"
                                        class="block w-full"
                                        {{-- required --}}/>
                                </td>
                                <td class="col-span-6 pr-2">
                                    <x-textarea type="text"
                                        placeholder="I saw ...."
                                        class="block w-full mb-2"
                                        readonly
                                    >
                                        <x-slot name="text">
                                            {{ $blotter->users[$index]->pivot['narrative'] }}
                                        </x-slot>
                                    </x-textarea>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blotter->users as $index => $user)
                            @if ($user->pivot['role'] == 'Victim')
                            <tr>
                                <td class="flex px-2">
                                    <x-input type="text"
                                        autocomplete="off"
                                        readonly
                                        id="users[{{$index}}][fullname]"
                                        name="users[{{$index}}][fullname]"
                                        value="{{ $user->firstname .' '. $user->lastname}}"
                                        placeholder="Name"
                                        class="block w-full"
                                        {{-- required --}}/>
                                </td>
                                <td class="col-span-6 pr-2">
                                    <x-textarea type="text"
                                        placeholder="I saw ...."
                                        class="block w-full mb-2"
                                        readonly
                                    >
                                        <x-slot name="text">
                                            {{ $blotter->users[$index]->pivot['narrative'] }}
                                        </x-slot>
                                    </x-textarea>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blotter->users as $index => $user)
                            @if ($user->pivot['role'] == 'Attacker')
                            <tr>
                                <td class="flex px-2">
                                    <x-input type="text"
                                        autocomplete="off"
                                        readonly
                                        id="users[{{$index}}][fullname]"
                                        name="users[{{$index}}][fullname]"
                                        value="{{ $user->firstname .' '. $user->lastname}}"
                                        placeholder="Name"
                                        class="block w-full"
                                        {{-- required --}}/>
                                </td>
                                <td class="col-span-6 pr-2">
                                    <x-textarea type="text"
                                        placeholder="I saw ...."
                                        class="block w-full mb-2"
                                        readonly
                                    >
                                        <x-slot name="text">
                                            {{ $blotter->users[$index]->pivot['narrative'] }}
                                        </x-slot>
                                    </x-textarea>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blotter->users as $index => $user)
                            @if ($user->pivot['role'] == 'Respondent')
                            <tr>
                                <td class="flex px-2">
                                    <x-input type="text"
                                        autocomplete="off"
                                        readonly
                                        id="users[{{$index}}][fullname]"
                                        name="users[{{$index}}][fullname]"
                                        value="{{ $user->firstname .' '. $user->lastname}}"
                                        placeholder="Name"
                                        class="block w-full"
                                        {{-- required --}}/>
                                </td>
                                <td class="col-span-6 pr-2">
                                    <x-textarea type="text"
                                        placeholder="I saw ...."
                                        class="block w-full mb-2"
                                        readonly
                                    >
                                        <x-slot name="text">
                                            {{ $blotter->users[$index]->pivot['narrative'] }}
                                        </x-slot>
                                    </x-textarea>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </section>
        </section>

        <div class="mt-4 flex flex-row-reverse space-x-4">
            <x-button type="button" class="block w-30">
                {{ __('Close') }}
            </x-button>
        </div>
    </form>
</div>
