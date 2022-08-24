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

    <form wire:submit.prevent="submit" id="edit-user-form">
        @wire
        <section>
            <h5 class="col-span-12 my-2 font-medium">Personal Information</h5>
            <div class="pl-3 grid grid-cols-1 md:grid-cols-6 xl:grid-cols-12 gap-4 mb-4">
                <div class="col-span-3">
                    <x-form-input placeholder="John" name="user.firstname" label="First name" />
                </div>
                
                <div class="col-span-3">
                    <x-form-input placeholder="D." name="user.middlename" label="Middle name" />
                </div>
                
                <div class="col-span-3">
                    <x-form-input placeholder="Doe" name="user.lastname" label="Last name" />
                </div>
                
                <div class="col-span-3">
                    <x-form-input placeholder="Jr, III" name="user.suffix" label="Suffix" />
                </div>

                <div class="col-span-3">
                    <x-form-input name="user.birthday" label="Birthday Date" type="date"/>
                </div>

                <div class="col-span-3">
                    <x-form-input placeholder="Baguio City" name="user.birth_place" label="Birth Place" />
                </div>

                <div class="col-span-2">
                    <x-form-select :options="$genders" name="user.gender" label="Gender" />
                </div>

                <div class="col-span-2">
                    <x-form-input type="number" placeholder="Weight" name="user.weight" label="Weight (kg)" />
                </div>

                <div class="col-span-2">
                    <x-form-input type="number" placeholder="Height" name="user.height" label="Height (kg)" />
                </div>

                <div class="col-span-3">
                    <x-form-select :options="$civil_statuses" name="user.civil_status" label="Civil status" />
                </div>

                <div class="col-span-3">
                    <x-form-input placeholder="Filipino" name="user.citizenship" label="Citizenship" />
                </div>

                <div class="col-span-3">
                    <x-form-select :options="$isVoter_choice" name="user.isVoter" label="Voter Type" />
                </div>
            </div>
        </section>
    
        <section>
            <h5 class="col-span-12 my-2 font-medium">Family Information</h5>
            <div class="pl-3 grid grid-cols-1 md:grid-cols-6 xl:grid-cols-12 gap-4 mb-4">
                <div class="col-span-6">
                    <x-form-input placeholder="Jhon Doe's father" name="user.father" label="Father" />
                </div>

                <div class="col-span-6">
                    <x-form-input placeholder="Jhon Doe's mother" name="user.mother" label="Mother" />
                </div>

                <div class="col-span-6">
                    <x-form-input placeholder="Jhon Doe's spouse" name="user.spouse" label="Spouse" />
                </div>
            </div>
        </section>

        <section>
            <h5 class="col-span-12 my-2 font-medium">Contact / Account Information</h5>
            <div class="pl-3 grid grid-cols-1 md:grid-cols-6 xl:grid-cols-12 gap-4 mb-4">
                <div class="col-span-4">
                    <x-form-input placeholder="09123456789" name="user.mobile_no" label="Mobile Number" />
                </div>

                <div class="col-span-4">
                    <x-form-input placeholder="john_doe@gmail.com" name="user.email" label="Email" />
                </div>

                <div class="col-span-4">
                    <x-form-input placeholder="123-456-789" name="user.telephone_no" label="Telephone Number" />
                </div>

                <div class="col-span-6">
                    <x-form-input placeholder="P.O Box 1234, Baguio Post Office" name="user.address_1" label="address 1" />
                </div>

                <div class="col-span-6">
                    <x-form-input placeholder="P.O Box 5678, Baguio Post Office" name="user.address_2" label="address 2" />
                </div>

                <div class="col-span-3">
                    <x-form-input type="number" placeholder="000" name="user.house_no" label="House Number" />
                </div>

                <div class="col-span-4">
                    <x-form-input placeholder="Purok / Area" name="user.prk_area" label="Purok / Area" />
                </div>

                <div class="col-span-5">
                    <x-form-label label="Reset password" class="!mb-1"/>
                    <div class="flex flex-row space-x-2">
                        <x-form-submit type="button" class="w-max" wire:click="resetPassword">
                            Reset Password
                        </x-form-submit>

                        <p class="font-thin text-xs text-justify">
                            The default password is the first letter of the first name then "." then the full last name. e.g., 
                            <span class="font-bold">s.sample</span>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <h5 class="col-span-12 my-2 font-medium">Goverment IDs</h5>
            <div class="pl-3 grid grid-cols-1 md:grid-cols-6 xl:grid-cols-12 gap-4 mb-4">
                <div class="col-span-4">
                    <x-form-input placeholder="1234-5678-1011" name="user.pag_ibig" label="Pag-IBIG" />
                </div>

                <div class="col-span-4">
                    <x-form-input placeholder="1234-5678-1011" name="user.philhealth" label="Philhealth" />
                </div>

                <div class="col-span-4">
                    <x-form-input placeholder="01-0234567-0" name="user.sss" label="SSS" />
                </div>

                <div class="col-span-4">
                    <x-form-input placeholder="123-456-789-101" name="user.tin" label="TIN" />
                </div>
            </div>
        </section>
        
        <div class="mt-4 flex flex-row justify-end space-x-4">
            <x-form-submit type="submit" class="block w-30">
                {{ __('Save User') }}
            </x-form-submit>
        </div>
        @endwire  
    </form>
</div>
