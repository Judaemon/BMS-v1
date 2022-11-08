<?php

namespace App\Http\Livewire\Certificate;

use App\Models\Certificate;
use LivewireUI\Modal\ModalComponent;

class DeleteCertificate extends ModalComponent
{
    public Certificate $certificate;

    public function mount(Certificate $certificate)
    {
        $this->certificate = $certificate;
    }
    
    public function render()
    {
        return view('livewire.certificate.delete-certificate');
    }

    public function submit()
    {
        $this->certificate->delete();

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-CertificateTable')
        ]);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Deleted Successfully',
            'text' => 'Certificate succesfully deleted',
            'icon' => 'success',
        ]);
    }
}
