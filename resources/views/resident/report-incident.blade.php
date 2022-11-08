<x-app-layout>
    <x-slot name="header">
        {{ __('Report Incident') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xl">
        @livewire('resident.report-incident')
    </div>
</x-app-layout>
