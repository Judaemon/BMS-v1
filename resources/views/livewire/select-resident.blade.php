<div class="p-2">
    <div class="" style="zoom: 90%">
        @livewire('select-resident-table')
    </div>
    <div class="flex">
        <x-button wire:click="$emit('closeModal')">
            {{ __('cancel') }}
        </x-button>
    </div>
</div>
