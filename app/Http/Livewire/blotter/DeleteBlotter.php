<?php

namespace App\Http\Livewire\Blotter;

use App\Models\Blotter;
use LivewireUI\Modal\ModalComponent;

class DeleteBlotter extends ModalComponent
{
    public Blotter $blotter;

    public function mount(Blotter $blotter)
    {
        $this->blotter = $blotter;
    }

    public function render()
    {
        return view('livewire.blotter.delete-blotter');
    }

    public function submit()
    {
        $this->blotter->delete();

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-BlotterTable')
        ]);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Deleted Successfully',
            'text' => 'Blotter succesfully deleted',
            'icon' => 'success',
        ]);
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}
