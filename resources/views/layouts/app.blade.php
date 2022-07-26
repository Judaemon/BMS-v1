<!DOCTYPE html>
<html x-data="data" lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ SystemSetting('barangay') }} BMS</title>

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

        <!-- Scripts Testing-->
        @vite('resources/js/app.js')
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <script src="{{ asset('js/init-alpine.js') }}" ></script>

        @livewireStyles
        @powerGridStyles

        <style>
            /* powergrid slect arrow fix*/
            table.power-grid-table select{
                background-position: right .3rem center;
            }
        </style>
</head>
<body>
<div
    class="flex h-screen bg-gray-50"
    :class="{ 'overflow-hidden': isSideMenuOpen }"
>
    {{-- For specific roles --}}
    @hasanyrole('Super Admin|Officer')
    <!-- Desktop sidebar -->
    @include('layouts.navigation')
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    @include('layouts.navigation-mobile')
    @endhasallroles
    
    @hasanyrole('Resident')
    <!-- Desktop sidebar -->
    @include('layouts.resident.navigation')
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    @include('layouts.resident.navigation-mobile')
    @endhasallroles

    <div class="flex flex-col flex-1 w-full">
        @include('layouts.top-menu')
        <main class="h-full overflow-y-auto">
            <div class="container px-6 mx-auto grid">
                @isset ($header)
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 text-center">
                        {{ $header }}
                    </h2>    
                @endisset
                

                {{ $slot }}
            </div>
        </main>
    </div>
</div>

@livewireScripts
@powerGridScripts
@livewire('livewire-ui-modal')

{{-- SweetAlert Added --}}
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script src="{{ asset('js/sweetalert2@11.js') }}" ></script>

<script>
    window.addEventListener('swal', function (e){
        Swal.fire(e.detail);
    });
</script>

</body>
</html>
