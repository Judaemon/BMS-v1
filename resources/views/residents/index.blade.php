<x-app-layout>
    <x-slot name="header">
        {{ __('Residents') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs overflow-hidden">
        <div class=" mb-8 w-full rounded-lg border shadow-xs p-2" style="zoom: 90%;">
            @livewire('resident.resident-table')
        </div>
    </div>

    <script>
         window.addEventListener('swal-confirm', function (e){
            Swal.fire(e.detail).then((result) => {
                if (result.isConfirmed) {
                    livewire.emit('deleteResident')
                }
            })
        });
    </script>
</x-app-layout>
