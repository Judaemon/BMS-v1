<?php

namespace App\Http\Livewire\Certificate;

use App\Models\Certificate;
use App\Models\CertificateRequest;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class AddCertificateRequest extends ModalComponent
{
    public $user_id;
    public $user_fullname;
    public $purpose;
    public $certificate_type;
    public $certificate_signature;

    //Unpaid //Paid //Released //Cancelled (if Unpaid > 30 days)
    public $status = "Unpaid";

    public $certificate_types;

    protected $listeners = [
        'selectedUser',
    ];

    protected $rules = [
        'user_id' => ['required'],
        'purpose' => ['required'],
        'certificate_type' => ['required', 'exists:certificates,type'],
        'status' => ['required'],
    ];

    protected $messages = [
        'user_fullname.required' => 'The user field is required.',
    ];

    public function mount()
    {
        $certificate_types = Certificate::pluck('type')->toArray();

        $this->certificate_types  = array_combine($certificate_types, $certificate_types);
        $certificate_types  = array_combine($certificate_types, $certificate_types);
        $this->certificate_types = ["Placeholder" => "Select Certificate"] + $certificate_types;

        if (Auth::user()->hasRole('Resident')) {
            $this->user_id = Auth::user()->id;
        }
    }

    public function render()
    {
        return view('livewire.certificate.add-certificate-request');
    }

    public function submit()
    {
        // dd($this->certificate_types);
        $this->validate();


        // CertificateRequest::create([
        //     'user_id' => $this->user_id,
        //     'purpose' => $this->purpose,
        //     'certificate_type' => $this->certificate_type,
        //     'status' => $this->status,
        //     'certificate_signature' => $this->certificate_signature,
        // ]);
        $this->validate();

        CertificateRequest::create([
            'user_id' => $this->user_id,
            'purpose' => $this->purpose,
            'certificate_type' => $this->certificate_type,
            'status' => $this->status,
        ]);

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
