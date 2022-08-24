<div wire:ignore.self class="p-4">
    <span class="sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-7xl"></span>
    <div class="flex flex-row pb-2 justify-between ">
        <h3 class="font-bold">{{ $resident->firstname }} {{ $resident->lastname }} Information</h3>
  
        <button onclick='Livewire.emit("closeModal")' class="bg-transparent text-cool-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
        </button>
    </div>
    
    <hr>

    <div id="view-resident">
        <h5 class="col-span-12 my-2 font-medium">Personal Information</h5>
        <div class="grid grid-cols-1 md:grid-cols-6 xl:grid-cols-12 gap-4 mb-4">
            <div class="col-span-3">
                <x-label :value="__('First name')" for="firstname"/>
                <x-input type="text"
                            value="{{ $resident->firstname }}"
                            {{-- disabled --}}
                            id="firstname"
                            name="firstname"
                            {{-- value="{{ old('firstname') }}" --}}
                            placeholder="John"
                            class="block w-full"
                            {{-- required --}}
                            autofocus/>
            </div>
            <div class="col-span-3">
                <x-label :value="__('Middle name')" for="middlename"/>
                <x-input type="text"
                            value="{{ $resident->middlename }}"
                            disabled
                            id="middlename"
                            name="middlename"
                            {{-- value="{{ old('middlename') }}" --}}
                            placeholder="mdln"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-3">
                <x-label :value="__('Last name')" for="lastname"/>
                <x-input type="text"
                            value="{{ $resident->lastname }}"
                            disabled
                            id="lastname"
                            name="lastname"
                            {{-- value="{{ old('lastname') }}" --}}
                            placeholder="Doe"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-3">
                <x-label :value="__('Suffix')"/>
                <x-input type="text"
                            value="{{ $resident->suffix }}"
                            disabled
                            id="suffix"
                            name="suffix"
                            {{-- value="{{ old('suffix') }}" --}}
                            placeholder="Jr, III"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-3">
                <x-label :value="__('Birth Date')"/>
                <x-input type="date"
                            value="{{ $resident->birthday }}"
                            disabled
                            id="birthday"
                            name="birthday"
                            {{-- value="{{ old('birthday') }}" --}}
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-3">
                <x-label :value="__('Birth Place')"/>
                <x-input type="text"
                            value="{{ $resident->birth_place }}"
                            disabled
                            id="birth_place"
                            name="birth_place"
                            {{-- value="{{ old('birth_place') }}" --}}
                            placeholder="Baguio City"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-2">
                <x-label :value="__('Gender')"/>
                <x-select :options="['Male' => 'Male', 'Female' => 'Female', 'other' => 'Other']"
                            :selectedItem="$resident->gender"
                            id="gender"
                            name="gender"
                            {{-- value="{{ old('gender') }}" --}}
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-2">
                <x-label :value="__('Weight (kg)')"/>
                <x-input type="number"
                            value="{{ $resident->weight }}"
                            disabled
                            min="0"
                            id="weight"
                            name="weight"
                            {{-- value="{{ old('weight') }}" --}}
                            placeholder="00"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-2">
                <x-label :value="__('Height (kg)')"/>
                <x-input type="number"
                            value="{{ $resident->height }}"
                            disabled
                            min="0"
                            id="height"
                            name="height"
                            {{-- value="{{ old('height') }}" --}}
                            placeholder="00"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-3">
                <x-label :value="__('Civil Status')"/>
                <x-select :options="['Single' => 'Single', 'Married' => 'Married', 'Widowed' => 'Widowed', 'Separated' => 'Separated', 'Divorced' => 'Divorced']"
                            :selectedItem="$resident->civil_status"
                            id="civil_status"
                            name="civil_status"
                            {{-- value="{{ old('civil_status') }}" --}}
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-3">
                <x-label :value="__('Citizenship')"/>
                <x-input type="text"
                            value="{{ $resident->citizenship }}"
                            disabled
                            id="citizenship"
                            name="citizenship"
                            {{-- value="{{ old('citizenship') }}" --}}
                            placeholder="Filipino"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-3">
                <x-label :value="__('Voter status')"/>
                <x-select :options="[true => 'Voter', false => 'Non-voter']"
                            :selectedItem="$resident->isVoter"
                            id="isVoter"
                            name="isVoter"
                            {{-- value="{{ old('isVoter') }}" --}}
                            class="block w-full"
                            {{-- required --}}/>
            </div>
        </div>
    
        <hr>
    
        <h5 class="col-span-12 my-2 font-medium">Family Information</h5>
        <div class="grid grid-cols-1 md:grid-cols-6 xl:grid-cols-12 gap-4 mb-4">
            <div class="col-span-6">
                <x-label :value="__('Father')" for='father'/>
                <x-input type="text"
                            value="{{ $resident->father }}"
                            disabled
                            id="father"
                            name="father"
                            {{-- value="{{ old('father') }}" --}}
                            placeholder="Jhon Doe's Father"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-6">
                <x-label :value="__('Mother')" for='mother'/>
                <x-input type="text"
                            value="{{ $resident->mother }}"
                            disabled
                            id="mother"
                            name="mother"
                            {{-- value="{{ old('mother') }}" --}}
                            placeholder="Jhon Doe's Mother"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-6">
                <x-label :value="__('Spouse')" for='spouse'/>
                <x-input type="text"
                            value="{{ $resident->spouse }}"
                            disabled
                            id="spouse"
                            name="spouse"
                            {{-- value="{{ old('spouse') }}" --}}
                            placeholder="Jhon Doe's spouse"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
        </div>
    
        <hr>
    
        <h5 class="col-span-12 my-2 font-medium">Contact Information</h5>
        <div class="grid grid-cols-1 md:grid-cols-6 xl:grid-cols-12 gap-4 mb-4">
            <div class="col-span-4">
                <x-label :value="__('Mobile Number')" for="mobile_no"/>
                <x-input type="number"
                            value="{{ $resident->mobile_no }}"
                            disabled
                            id="mobile_no"
                            name="mobile_no"
                            {{-- value="{{ old('mobile_no') }}" --}}
                            placeholder="09123456789"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-4">
                <x-label :value="__('email')" for="email"/>
                <x-input type="text"
                            value="{{ $resident->email }}"
                            disabled
                            id="email"
                            name="email"
                            {{-- value="{{ old('email') }}" --}}
                            placeholder="john_doe@gmail.com"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-4">
                <x-label :value="__('Telephone Number')" for="telephone_no"/>
                <x-input type="number"
                            value="{{ $resident->telephone_no }}"
                            disabled
                            id="telephone_no"
                            name="telephone_no"
                            {{-- value="{{ old('telephone_no') }}" --}}
                            placeholder="123-456-789"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-6">
                <x-label :value="__('Adress 1')" for="address_1"/>
                <x-input type="text"
                            value="{{ $resident->address_1 }}"
                            disabled
                            id="address_1"
                            name="address_1"
                            {{-- value="{{ old('address_1') }}" --}}
                            placeholder='P.O Box 1234, Baguio Post Office'
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-6">
                <x-label :value="__('Address 2')" for="address_2"/>
                <x-input type="text"
                            value="{{ $resident->address_2 }}"
                            disabled
                            id="address_2"
                            name="address_2"
                            {{-- value="{{ old('address_2') }}" --}}
                            placeholder='P.O Box 5678, Baguio Post Office'
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-2">
                <x-label :value="__('House Number')" for="house_no"/>
                <x-input type="text"
                            value="{{ $resident->house_no }}"
                            disabled
                            id="house_no"
                            name="house_no"
                            {{-- value="{{ old('house_no') }}" --}}
                            placeholder="00"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-3">
                <x-label :value="__('Purok / Area')" for="prk_area"/>
                <x-input type="text"
                            value="{{ $resident->prk_area }}"
                            disabled
                            id="prk_area"
                            name="prk_area"
                            {{-- value="{{ old('prk_area') }}" --}}
                            placeholder="Purok / Area"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
        </div>
    
        <hr>
    
        <h5 class="col-span-12 my-2 font-medium">Goverment IDs</h5>
        <div class="grid grid-cols-1 md:grid-cols-6 xl:grid-cols-12 gap-4 mb-4">
            <div class="col-span-4">
                <x-label :value="__('Pag-IBIG')" for="pag_ibig"/>
                <x-input type="number"
                            value="{{ $resident->pag_ibig }}"
                            disabled
                            id="pag_ibig"
                            name="pag_ibig"
                            {{-- value="{{ old('pag_ibig') }}" --}}
                            placeholder="1234-5678-1011"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-4">
                <x-label :value="__('PHILHEALTH')" for="philhealth"/>
                <x-input type="number"
                            value="{{ $resident->philhealth }}"
                            disabled
                            id="philhealth"
                            name="philhealth"
                            {{-- value="{{ old('philhealth') }}" --}}
                            placeholder="1234-5678-1011"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-4">
                <x-label :value="__('SSS')" for="sss"/>
                <x-input type="number"
                            value="{{ $resident->sss }}"
                            disabled
                            id="sss"
                            name="sss"
                            {{-- value="{{ old('sss') }}" --}}
                            placeholder="01-0234567-0"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
            <div class="col-span-4">
                <x-label :value="__('TIN')" for="tin"/>
                <x-input type="number"
                            value="{{ $resident->tin }}"
                            disabled
                            id="tin"
                            name="tin"
                            {{-- value="{{ old('tin') }}" --}}
                            placeholder="123-456-789-101"
                            class="block w-full"
                            {{-- required --}}/>
            </div>
        </div>
    </div>

    <div class="mt-4 flex flex-row-reverse space-x-4">
        <x-button wire:click="$emit('closeModal')" class="block order-last !text-cool-gray-500 !bg-transparent hover:border-blue-500 border-2  hover:text-cool-gray-500">
            {{ __('Close') }}
        </x-button>
    </div>
</div>
