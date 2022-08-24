<x-app-layout>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>

    {{-- para makita yung pagination --}}
    {{-- <style>
        .powergrid-table-container nav{
            background-color: #27303f;
        }
    </style> --}}

    <div class="p-4 bg-white rounded-lg shadow-xs overflow-hidden">
        <div class="powergrid-table-container mb-8 w-full rounded-lg border shadow-xs p-2" style="zoom: 90%;">
            @livewire('user.user-table' , ['tableName' => 'UserTable'])
            {{-- @livewire('user.user-table' , ['tableName' => 'UserTable', 'role' => 'Super Admin']) --}}
        </div>
    </div>

    <script>
        window.addEventListener('swal-confirm', function (e){
           Swal.fire(e.detail).then((result) => {
               if (result.isConfirmed) {
                console.log(result.isConfirmed);
               }
           })
       });
   </script>
</x-app-layout>
