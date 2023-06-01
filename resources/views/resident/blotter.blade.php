<x-app-layout>
    <x-slot name="header">
        {{ __('About us') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        {{ __('Sample static text page') }}
        {{ __('Blotter') }}
        </x-slot>

        <div class="p-4 bg-white rounded-lg shadow-xs">
            {{ __('You can see blotter here if youre invovled in any.') }}
        </div>
</x-app-layout>
