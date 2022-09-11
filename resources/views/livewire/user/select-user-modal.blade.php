<div class="p-2">
    <div class="" style="zoom: 90%">
        @livewire('user.select-user-table')
    </div>

    <div class="flex justify-end">
        <x-button wire:click="$emit('closeModal')">
            {{ __('Close') }}
        </x-button>
    </div>
</div>
