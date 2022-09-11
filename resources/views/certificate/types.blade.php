<x-app-layout>
    <x-slot name="header">
        {{ __('Certificate Types') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs overflow-hidden">
        <div class="powergrid-table-container mb-8 w-full rounded-lg border shadow-xs p-2" style="zoom: 90%;">
            @livewire('certificate.certificate-table' , ['tableName' => 'CertificateTable'])
        </div>
    </div>
</x-app-layout>
