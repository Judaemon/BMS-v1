<?php

namespace App\Http\Livewire\Certificate;

use App\Models\Certificate;
use App\Models\CertificateRequest;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use LivewireUI\Modal\ModalComponent;

class UpdateCertificateRequest extends ModalComponent
{
    public CertificateRequest $certificate_request;
    public $fullname;

    public $status = [
        'Unpaid' => 'Unpaid', 
        'Paid' => 'Paid', 
        'Released' => 'Released',
        'Cancelled' => 'Cancelled',
    ];

    protected $listeners = [
        'selectedUser',
    ];

    protected $rules = [
        'certificate_request.user_id' => ['required'],
        'certificate_request.purpose' => ['required'],
        'certificate_request.certificate_type' => ['required', 'exists:certificates,type'],
        'certificate_request.status' => ['required'],
    ];

    protected $messages = [
        'user_fullname.required' => 'The user field is required.',
    ];

    public function mount(CertificateRequest $certificate_request)
    {
        $this->certificate_request = $certificate_request;

        $user = User::findOrFail($certificate_request['user_id']);
        
        $this->user = $user;

        $this->fullname = $user['firstname']." ".$user['middlename'] ;
    }

    public function render()
    {
        return view('livewire.certificate.update-certificate-request');
    }

    public function submit()
    {
        // dd($this->fullname);
        $this->validate();
    
        $this->certificate_request->save();

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-CertificateRequestTable')
        ]);
        
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Certificate Request Added',
            'text' => 'Certificate Request Succesfully Added',
            'icon' => 'success',
        ]);
    }


    public function setStatusToPaid()
    {
        $this->certificate_request['status'] = "Paid";
        
        $this->certificate_request->save();

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-CertificateRequestTable')
        ]);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Status set to Paid',
            'timer'=>3000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right'
        ]);
    }

    public function setStatusToReleased()
    {
        $this->certificate_request['status'] = "Released";
        
        $this->certificate_request->save();

        $this->emit('pg:eventRefresh-CertificateRequestTable');

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Status set to Released',
            'timer'=>3000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right'
        ]);
    }

    public function print()
    {
        $pdf = PDF::loadview('certificate.certificates-layout.certOfResidency');

        return $pdf->download('certiicate.pdf');
        // $this->certificate_request['status'] = "Released";
        
        // // $this->certificate_request->save();

        // $this->dispatchBrowserEvent('swal', [
        //     'title' => 'Status set to Released',
        //     'timer'=>3000,
        //     'icon'=>'success',
        //     'toast'=>true,
        //     'position'=>'top-right'
        // ]);
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
