<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Resident;

use Livewire\WithPagination;

class SelectResident extends ModalComponent
{
    use WithPagination;

    public function render()
    {
        return view('livewire.select-resident');
    }

    public static function modalMaxWidth(): string
    {
        // 'sm'  => 'sm:max-w-sm',
        // 'md'  => 'sm:max-w-md',
        // 'lg'  => 'sm:max-w-md md:max-w-lg',
        // 'xl'  => 'sm:max-w-md md:max-w-xl',
        // '2xl' => 'sm:max-w-md md:max-w-xl lg:max-w-2xl',
        // '3xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl',
        // '4xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-4xl',
        // '5xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl',
        // '6xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-6xl',
        // '7xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-7xl',
        return '7xl';
    }
}
