<x-app-layout>
    <x-slot name="header">
        {{ __('Schedule') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs flex flex-col">
        <div class="flex flex-col space-y-2 xl:space-x-2 xl:space-y-0 xl:flex-row">
            <div class="p-2 bg-blue-800 flex-1 text-center">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white ">0</h5>
                <h1 class="mb-2 text-1xl text-white">Settled Cases</h1>
            </div>
            <div class="p-2 bg-red-800 flex-1 text-center">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white ">0</h5>
                <h1 class="mb-2 text-1xl text-white">Ongoing Cases</h1>
            </div>
            <div class="p-2 bg-orange-700 flex-1 text-center">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white ">0</h5>
                <h1 class="mb-2 text-1xl text-white">Unscheduled Cases</h1>
            </div>
        </div>
    </div>

    <div class="p-4 bg-white rounded-lg shadow-xs overflow-hidden">
        <div class=" mb-8 w-full rounded-lg border shadow-xs p-2" style="zoom: 90%;">
            @livewire('blotter.blotter-table', ['tableName' => 'BlotterScheduleTable'])
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
