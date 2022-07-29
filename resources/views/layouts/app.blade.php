<!DOCTYPE html>
<html x-data="data" lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

        <!-- Scripts Testing-->
        @vite('resources/js/app.js')
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <script src="{{ asset('js/init-alpine.js') }}" ></script>

        @livewireStyles
        @powerGridStyles
</head>
<body>
<div
    class="flex h-screen bg-gray-50"
    :class="{ 'overflow-hidden': isSideMenuOpen }"
>
    <!-- Desktop sidebar -->
    @include('layouts.navigation')
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    @include('layouts.navigation-mobile')
    <div class="flex flex-col flex-1 w-full">
        @include('layouts.top-menu')
        <main class="h-full overflow-y-auto">
            <div class="container px-6 mx-auto grid">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 text-center">
                    {{ $header }}
                </h2>

                {{ $slot }}
            </div>
        </main>
    </div>
</div>

@livewireScripts
@powerGridScripts
@livewire('livewire-ui-modal')

{{-- For adding blotter --}}
<script>
    Livewire.on('selectingResident', index => {
        Livewire.emit('openModal', 'select-resident');
        Livewire.emit('getSelectedResidentIndex', index);
    })
</script>

{{-- SweetAlert Added --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.addEventListener('swal', function (e){
        Swal.fire(e.detail);
    });
</script>

</body>
</html>
