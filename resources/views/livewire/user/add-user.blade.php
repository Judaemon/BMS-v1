<div wire:ignore.self class="p-4">
    <span class="sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-7xl"></span>
    <div class="flex flex-row pb-2 justify-between ">
        <h3 class="font-bold">Add User</h3>
        
        <button onclick='Livewire.emit("closeModal")' class="bg-transparent text-cool-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
        </button>
    </div>
    
    <hr>

    <form wire:submit.prevent="submit" id="add-user-form">
        @wire
        <section>
            <h5 class="col-span-12 my-2 font-medium">Personal Information</h5>
            <div class="pl-3 grid grid-cols-1 md:grid-cols-6 xl:grid-cols-12 gap-4 mb-4">
                <div class="col-span-3">
                    <x-form-input placeholder="John" name="firstname" label="First name" />
                </div>
                
                <div class="col-span-3">
                    <x-form-input placeholder="D." name="middlename" label="Middle name" />
                </div>
                
                <div class="col-span-3">
                    <x-form-input placeholder="Doe" name="lastname" label="Last name" />
                </div>
                
                <div class="col-span-3">
                    <x-form-input placeholder="Jr, III" name="suffix" label="Suffix" />
                </div>

                <div class="col-span-3">
                    <x-form-input name="birthday" label="Birthday Date" type="date"/>
                </div>

                <div class="col-span-3">
                    <x-form-input placeholder="Baguio City" name="birth_place" label="Birth Place" />
                </div>

                <div class="col-span-2">
                    <x-form-select :options="$genders" name="gender" label="Gender" />
                </div>

                <div class="col-span-2">
                    <x-form-input type="number" placeholder="Weight" name="weight" label="Weight (kg)" />
                </div>

                <div class="col-span-2">
                    <x-form-input type="number" placeholder="Height" name="height" label="Height (kg)" />
                </div>

                <div class="col-span-3">
                    <x-form-select :options="$civil_statuses" name="civil_status" label="Civil status" />
                </div>

                <div class="col-span-3">
                    <x-form-input placeholder="Filipino" name="citizenship" label="Citizenship" />
                </div>

                <div class="col-span-3">
                    <x-form-select :options="$isVoter_choice" name="isVoter" label="Voter Type" />
                </div>
            </div>
        </section>
    
        <section>
            <h5 class="col-span-12 my-2 font-medium">Family Information</h5>
            <div class="pl-3 grid grid-cols-1 md:grid-cols-6 xl:grid-cols-12 gap-4 mb-4">
                <div class="col-span-6">
                    <x-form-input placeholder="Jhon Doe's father" name="father" label="Father" />
                </div>

                <div class="col-span-6">
                    <x-form-input placeholder="Jhon Doe's mother" name="mother" label="Mother" />
                </div>

                <div class="col-span-6">
                    <x-form-input placeholder="Jhon Doe's spouse" name="spouse" label="Spouse" />
                </div>
            </div>
        </section>

        <section>
            <h5 class="col-span-12 my-2 font-medium">Contact Information</h5>
            <div class="pl-3 grid grid-cols-1 md:grid-cols-6 xl:grid-cols-12 gap-4 mb-4">
                <div class="col-span-4">
                    <x-form-input placeholder="09123456789" name="mobile_no" label="Mobile Number" />
                </div>

                <div class="col-span-4">
                    <x-form-input placeholder="john_doe@gmail.com" name="email" label="Email" />
                </div>

                <div class="col-span-4">
                    <x-form-input placeholder="123-456-789" name="telephone_no" label="Telephone Number" />
                </div>

                <div class="col-span-6">
                    <x-form-input placeholder="P.O Box 1234, Baguio Post Office" name="address_1" label="address 1" />
                </div>

                <div class="col-span-6">
                    <x-form-input placeholder="P.O Box 5678, Baguio Post Office" name="address_2" label="address 2" />
                </div>

                <div class="col-span-3">
                    <x-form-input type="number" placeholder="000" name="house_no" label="House Number" />
                </div>

                <div class="col-span-4">
                    <x-form-input placeholder="Purok / Area" name="prk_area" label="Purok / Area" />
                </div>
                
                <div class="col-span-5">
                    <x-form-label label="Password" class="!mb-1"/>
                    <p class="font-thin text-sm">
                        The default password is the first letter of the first name then "." then the full last name. e.g., 
                        <span class="font-medium">s.sample</span>
                    </p>
                </div>
            </div>
        </section>

        <section>
            <h5 class="col-span-12 my-2 font-medium">Goverment IDs</h5>
            <div class="pl-3 grid grid-cols-1 md:grid-cols-6 xl:grid-cols-12 gap-4 mb-4">
                <div class="col-span-4">
                    <x-form-input placeholder="1234-5678-1011" name="pag_ibig" label="Pag-IBIG" />
                </div>

                <div class="col-span-4">
                    <x-form-input placeholder="1234-5678-1011" name="philhealth" label="Philhealth" />
                </div>

                <div class="col-span-4">
                    <x-form-input placeholder="01-0234567-0" name="sss" label="SSS" />
                </div>

                <div class="col-span-4">
                    <x-form-input placeholder="123-456-789-101" name="tin" label="TIN" />
                </div>
            </div>
        </section>
        
        <div class="mt-4 flex flex-row justify-end space-x-4">
            <x-form-submit type="reset" class="block order-last !text-cool-gray-500 !bg-transparent hover:border-blue-500 border-2  hover:text-cool-gray-500">
                {{ __('Reset form') }}
            </x-form-submit>

            <x-form-submit type="submit" class="block w-30">
                {{ __('Add User') }}
            </x-form-submit>
        </div>
        @endwire  
    </form>
</div>
