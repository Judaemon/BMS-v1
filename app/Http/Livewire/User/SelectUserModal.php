<?php

namespace App\Http\Livewire\User;

use LivewireUI\Modal\ModalComponent;

class SelectUserModal extends ModalComponent
{
    // used to show selectUserTable
    public function render()
    {
        return view('livewire.user.select-user-modal');
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public static function closeModalOnEscapeIsForceful(): bool
    {
        return false;
    }

    public static function dispatchCloseEvent(): bool
    {
        return true;
    }
}
