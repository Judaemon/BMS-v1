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
        return '7xl';
    }
}
