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
    ];

    public $status = 'Ongoing';
    public $incident_type;
    public $incident_location;
    public $incident_date_time;
    public $meeting_schedule_date_time;
    public $reported_date_time;
    public $incident_narrative;

    // residentID, residentFullname, role, narrative
    public $residents = [];
    public $selectedResidentIndex = '';

    public function render()
    {
        return view('livewire.blotter.add-blotter');
    }

    public function mount()
    {
        $this->residents = [
            ['role' => 'Complainant'],
        ];
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
        $this->residents[] = ['role' => 'Complainant'];
    }

    public function addVictim()
    {
        $this->residents[] = ['role' => 'Victim'];
    }

    public function addAttacker()
    {
        $this->residents[] = ['role' => 'Attacker'];
    }

    public function addRespondent()
    {
        $this->residents[] = ['role' => 'Respondent'];
    }

    public function removeComplainant($index)
    {
        unset($this->residents[$index]);
        array_values($this->residents); // Shuffles index?
    }

    public function getSelectedResidentIndex(int $index)
    {
        $this->selectedResidentIndex = $index;
    }

    public function setResidentID($residentData)
    {
        $fullname = $residentData['firstname'].' '.$residentData['lastname'];

        $residentOldData = $this->residents[$this->selectedResidentIndex];

        $this->residents[$this->selectedResidentIndex] = [
            "role" => $residentOldData['role'],
            "narrative" => $residentOldData['narrative'] ?? '',
            "fullname" => $fullname,
            "resident_id" => $residentData['resident_id']
        ];

        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        // 'sm'  => 'sm:max-w-sm',
        // 'md'  => 'sm:max-w-md',
        // 'lg'  => 'sm:max-w-md md:max-w-lg',
        // 'xl'  => 'sm:max-w-md md:max-w-xl',
        // '2xl' => 'sm:max-w-md md:max-w-xl lg:max-w-2xl',
        // '3xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl',
        // '4xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-4xl',
        // '5xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl',
        // '6xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-6xl',
        // '7xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-7xl',
        return '7xl';
    }
}
