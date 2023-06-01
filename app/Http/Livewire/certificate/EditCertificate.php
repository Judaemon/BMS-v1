<?php

namespace App\Http\Livewire\Certificate;

use App\Models\Certificate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class EditCertificate extends ModalComponent
{
    use WithFileUploads;

    public Certificate $certificate;

    protected $rules = [
        'certificate.type' => ['required'],
        'certificate.office' => ['required'],
        'certificate.filename' => ['required'],
    ];

    public function mount(Certificate $certificate)
    {
        $this->certificate = $certificate;
    }

    public function render()
    {
        return view('livewire.certificate.edit-certificate');
    }

    public function submit()
    {
        $this->validate();

        $this->certificate->save();

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-CertificateTable')
        ]);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Certificate Saved',
            'text' => 'Certificate succesfully edited',
            'icon' => 'success',
        ]);
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
