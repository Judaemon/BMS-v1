<?php

namespace App\Http\Livewire\Certificate;

use App\Models\Certificate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class AddCertificate extends ModalComponent
{
    use WithFileUploads;

    public $type;
    public $office;
    public $logo_1;
    public $logo_2;
    public $logo_3;

    protected $rules = [
        'type' => ['required'],
        // 'certificate.logo_1' => ['required'],
        // 'certificate.logo_2' => ['required'],
        // 'certificate.logo_3' => ['required'],
        'office' => ['required'],
        'filename' => ['required'],
    ];

    public function render()
    {
        return view('livewire.certificate.add-certificate');
    }

    public function submit()
    {
        $this->validate();

        Certificate::create([
            'type' => $this->type,
            'office' => $this->office,
            'filename' => $this->filename,
        ]);

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-CertificateTable')
        ]);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Certificate Added',
            'text' => 'Certificate Succesfully Added',
            'icon' => 'success',
        ]);
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
