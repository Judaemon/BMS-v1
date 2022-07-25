<?php

namespace App\Http\Livewire\Resident;

use App\Models\Resident;
use LivewireUI\Modal\ModalComponent;

class ViewResident extends ModalComponent
{
    public Resident $resident;

    public function mount($id)
    {
        $this->resident = Resident::where('id', $id)->first();
    }

    public function render()
    {
        return view('livewire.resident.view-resident');
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
