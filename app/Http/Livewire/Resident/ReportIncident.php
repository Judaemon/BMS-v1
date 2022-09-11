<?php

namespace App\Http\Livewire\Resident;

use App\Models\Blotter;
use Livewire\Component;

class ReportIncident extends Component
{
    protected $listeners = [
        'selectedUser',
    ];

    public $status = 'Ongoing';
    public $incident_type;
    public $incident_location;
    public $incident_date_time;
    public $meeting_schedule_date_time;
    public $reported_date_time;
    public $incident_narrative;

    // user role for pivot table. used as reference in adding
    public string $role;

    // userID, userFullname, role, narrative
    public $users = [];
    public $selectedUserIndex = '';

    public function render()
    {
        return view('livewire.resident.report-incident');
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

        foreach ($this->users as $user) {
            if (!empty($user['user_id'])) {
                $blotter->users()->attach($user['user_id'],
                    ['role' => $user['role'], 'narrative' => $user['narrative']]);
        
            }
        }

        $this->emit('pg:eventRefresh-BlotterTable');
        
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Blotter Added',
            'text' => 'Blotter Succesfully Added',
            'icon' => 'success',
        ]);
    }

    public function addComplainant()
    {
        $this->role = 'Complainant';

        $this->emit('openModal', 'user.select-user-modal');
    }

    public function addVictim()
    {
        $this->role = 'Victim';

        $this->emit('openModal', 'user.select-user-modal');
    }

    public function addAttacker()
    {
        $this->role = 'Attacker';

        $this->emit('openModal', 'user.select-user-modal');
    }

    public function addRespondent()
    {
        $this->role = 'Respondent';

        $this->emit('openModal', 'user.select-user-modal');
    }

    public function removeComplainant($index)
    {
        unset($this->users[$index]);
        array_values($this->users); // Shuffles index?
    }

    public function selectedUser($userData)
    {
        $this->users[] = [
            'user_id' => $userData['user_id'],
            'role' => $this->role,
            'narrative' => '',
            "firstname" => $userData['firstname'],
            "lastname" => $userData['lastname'],
        ];
    }
}
