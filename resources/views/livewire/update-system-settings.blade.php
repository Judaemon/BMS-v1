<form wire:submit.prevent="submit" action="{{route('settings.update', $system_setting->id)}}">
    @wire
    
    <div class="grid grid-cols-1 gap-4 md:grid-cols-6">
        <div class="col-span-3">
            <x-form-input placeholder="Sto. Rosario" name="system_setting.barangay" label="Barangay name" />
        </div>

        <div class="col-span-3">
            <x-form-input type="file" name="barangay_logo" label="Barangay Logo" />
        </div>

        <div class="col-span-3">
            <x-form-input placeholder="Sto. Rosario" name="system_setting.barangay_phone" label="Barangay phone number" />
        </div>

        <div class="col-span-3">
            <x-form-input placeholder="Sto. Rosario" name="system_setting.barangay_email" label="Barangay email" />
        </div>

        <div class="col-span-3">
            <x-form-input placeholder="Sto. Rosario" name="system_setting.province" label="Province" />
        </div>

        <div class="col-span-3">
            <x-form-input placeholder="Sto. Rosario" name="system_setting.municipality_city" label="municipality / City" />
        </div>

        <div class="col-span-3 md:col-span-6 flex flex-row justify-end">
            <x-form-submit type="submit" class="block w-30">
                {{ __('Update Settings') }}
            </x-form-submit>
        </div>
    </div>

    @endwire  
</form>