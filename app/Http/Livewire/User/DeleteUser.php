<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class DeleteUser extends ModalComponent
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.user.delete-user');
    }

    public function submit()
    {

        // dd($this->user);
        
        $this->user->delete();

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-UserTable')
        ]);

        // clear cashe for dashboard
        cache()->forget('registeredResident');
        
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Deleted Successfully',
            'text' => 'User succesfully deleted',
            'icon' => 'success',
        ]);
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}
