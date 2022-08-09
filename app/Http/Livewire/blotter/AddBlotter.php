<?php

namespace App\Http\Livewire\Blotter;

use LivewireUI\Modal\ModalComponent;

use App\Models\Blotter;
use App\Models\Resident;

class AddBlotter extends ModalComponent
{
    protected $listeners = [
        'residentSelected' => 'setResidentID',
        'getSelectedResidentIndex' => 'getSelectedResidentIndex',
        'addInvolvedResident',
    ];

    public $status = 'Ongoing';
    public $incident_type;
    public $incident_location;
    public $incident_date_time;
    public $meeting_schedule_date_time;
    public $reported_date_time;
    public $incident_narrative;

    // resident role for pivot table. used as reference in adding
    public string $role;

    // residentID, residentFullname, role, narrative
    public $residents = [];
    public $selectedResidentIndex = '';

    public function render()
    {
        return view('livewire.blotter.add-blotter');
    }

    public function submit()
    {
        $blotter = Blotter::create([
            'status' => $this->status,
            'incident_type' => $this->incident_type,
            'incident_location' => $this->incident_location,
            'incident_date_time' => $this->incident_date_time,
            'meeting_schedule_date_time' => $this->meeting_schedule_date_time,
            'reported_date_time' => $this->reported_date_time,
            'incident_narrative' => $this->incident_narrative,
        ]);

        foreach ($this->residents as $resident) {
            if (!empty($resident['resident_id'])) {
                $blotter->residents()->attach($resident['resident_id'],
                    ['role' => $resident['role'], 'narrative' => $resident['narrative']]);
        
            }
        }

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-BlotterTable')
        ]);
        
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Blotter Added',
            'text' => 'Blotter Succesfully Added',
            'icon' => 'success',
        ]);
    }

    public function addComplainant()
    {
        $this->role = 'Complainant';

        $this->emit('openModal', 'select-resident');
    }

    public function addVictim()
    {
        $this->role = 'Victim';

        $this->emit('openModal', 'select-resident');
    }

    public function addAttacker()
    {
        $this->role = 'Attacker';

        $this->emit('openModal', 'select-resident');
    }

    public function addRespondent()
    {
        $this->role = 'Respondent';

        $this->emit('openModal', 'select-resident');
    }

    public function removeComplainant($index)
    {
        unset($this->residents[$index]);
        array_values($this->residents); // Shuffles index?
    }

    public function addInvolvedResident($residentData)
    {
        $this->residents[] = [
            'resident_id' => $residentData['resident_id'],
            'role' => $this->role,
            'narrative' => '',
            "firstname" => $residentData['firstname'],
            "lastname" => $residentData['lastname'],
        ];

        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
