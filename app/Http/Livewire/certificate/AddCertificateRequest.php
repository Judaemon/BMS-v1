<?php

namespace App\Http\Livewire\Certificate;

use App\Models\Certificate;
use App\Models\CertificateRequest;
use LivewireUI\Modal\ModalComponent;

class AddCertificateRequest extends ModalComponent
{
    public $user_id;
    public $user_fullname;
    public $purpose;
    public $certificate_type;
    public $status;
    public $certificate_signature;

    public $certificate_types;

    protected $listeners = [
        'selectedUser',
    ];

    protected $rules = [
        'user_id' => ['required'],
        'user_fullname' => ['required'],
        'purpose' => ['required'],
        'certificate_type' => ['required'],
        'status' => ['required'],
        'certificate_signature' => ['required'],
    ];

    protected $messages = [
        'user_fullname.required' => 'The user field is required.',
    ];

    public function mount()
    {
        $certificate_types = Certificate::pluck('type')->toArray();
        
        $this->certificate_types  = array_combine($certificate_types, $certificate_types);
    }

    public function render()
    {
        return view('livewire.certificate.add-certificate-request');
    }

    public function submit()
    {
        dd($this->certificate_types);
        $this->validate();
        
    
        // CertificateRequest::create([
        //     'user_id' => $this->user_id,
        //     'purpose' => $this->purpose,
        //     'certificate_type' => $this->certificate_type,
        //     'status' => $this->status,
        //     'certificate_signature' => $this->certificate_signature,
        // ]);

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-CertificateRequestTable')
        ]);
        
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Certificate Request Added',
            'text' => 'Certificate Request Succesfully Added',
            'icon' => 'success',
        ]);
    }

    public function selectResident()
    {
        $this->emit('openModal', 'user.select-user-modal');
    }

    public function selectedUser($userData)
    {
        $this->user_id = $userData['user_id'];
        $this->user_fullname = $userData['firstname'].' '.$userData['lastname'];

        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
