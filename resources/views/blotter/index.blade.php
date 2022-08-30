<x-app-layout>
    <x-slot name="header">
        {{ __('Blotters') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs overflow-hidden">
        <div class=" mb-8 w-full rounded-lg border shadow-xs p-2" style="zoom: 90%;">
            @livewire('blotter.blotter-table', ['tableName' => 'BlotterTable'])
        </div>
    </div>

    <script>
         window.addEventListener('swal-confirm', function (e){
            Swal.fire(e.detail).then((result) => {
                if (result.isConfirmed) {
                    livewire.emit('deleteBlotter')
                }
            })
        });
    </script>
</x-app-layout>
